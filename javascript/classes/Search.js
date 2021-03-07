// import $ from 'jquery';

class Search {
  constructor() {
    this.openButton = $('a[href="#search"]');
    this.closeButton = $("#search, #search button.close");
    this.searchOverlay = $("#search");
    this.searchInput = $('#search > form > input[type="search"]');
    this.searchOutput = document.getElementById("search-overlay__results");
    // this.searchButton = $("#searchButton");
    this.events();
    //keeps track of whether overlay is open
    this.isOverlayOpen = false;
    //return value of setInterval for typing
    this.typingTimer;
    //keeps track of whether spinner is visible
    this.isSpinnerVisible = false;

    this.previousValue;
  }

  //events
  events() {
    this.openButton.on("click", this.openOverlay.bind(this));
    $(document).on("keydown", this.keyPressDispatcher.bind(this));
    this.searchInput.on("keyup", this.typingLogic.bind(this));
    this.closeButton.on("click", this.closeOverlay.bind(this));
  }

  //methods

  typingLogic() {
    //only runs if value of field is changed; ie, not on arrow key or shift key
    if (this.searchInput.val() !== this.previousValue) {
      clearTimeout(this.typingTimer);
      //if there is something in the search field
      if (this.searchInput.val()) {
        //outputs wait spinner if it's not visible
        if (!this.isSpinnerVisible) {
          this.searchOutput.innerHTML = '<div class="spinner-loader"></div>';
          //sets spinner visible variable to true
          this.isSpinnerVisible = true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 1500);
      } else {
        //the search field is empty
        this.searchOutput.innerHTML = "";
        this.isSpinnerVisible = false;
      }
    }
    this.previousValue = this.searchInput.val();
  }

  getResults() {
    //url for fetch
    const url = "fetch.php";
    const term = this.searchInput.val();
    const searchTerm = JSON.stringify({ term: term });
    console.log(searchTerm);
    fetch(url, {
      headers: {
        "Content-Type": "application/json",
      },
      method: "POST",
      //send id for fetch to use
      body: searchTerm,
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        if (data.character.length == 0) {
          const noMessage = document.createTextNode("No characters found");
          this.searchOutput.appendChild(noMessage);
        } else {
          //output results of fetch into div
          const searchResultUl = document.createElement("ul");
          console.log(data.character);
          for (const char of data.character) {
            const searchResultLi = document.createElement("li");
            const charLink = document.createElement("a");
            charLink.href = "details.php?id=" + char.id;
            // charLink.href = "details.php?id=55";s
            const liText = document.createTextNode(
              char.character_name + ", played by " + char.actor_name
            );
            searchResultLi.classList.add("no_bullet");
            searchResultLi.appendChild(liText);
            charLink.appendChild(searchResultLi);
            searchResultUl.appendChild(charLink);
            this.searchOutput.appendChild(searchResultUl);
          }
        }

        this.searchOutput.removeChild(
          document.querySelector(".spinner-loader")
        );
        
      });
    //sets spinner visible variable to true
    this.isSpinnerVisible = false;
  }

  keyPressDispatcher(e) {
    // pressing 's' opens overlay
    // note: third condition checks that no other input or textarea has focus
    if (
      e.keyCode == "83" &&
      !this.isOverlayOpen &&
      !$("input, textarea").is(":focus")
    ) {
      this.openOverlay();
      // pressing 'esc' closes overlay
    } else if (e.keyCode == "27" && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }

  openOverlay() {
    event.preventDefault();
    this.searchOverlay.addClass("open");
    $('#search > form > input[type="search"]').focus();
    this.isOverlayOpen = true;
  }

  closeOverlay() {
    if (
      event.target == this ||
      event.target.className == "close" ||
      event.keyCode == 27
    ) {
      this.searchOverlay.removeClass("open");
      this.searchInput.value = "";
      $('#search > form > input[type="search"]').value = "";
    }

    this.isOverlayOpen = false;
  }
}

export default Search;
