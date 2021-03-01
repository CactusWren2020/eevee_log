// import $ from 'jquery';

class Search {
    constructor() {
        this.openButton = $('a[href="#search"]');
        this.closeButton = $('#search, #search button.close');
        this.searchOverlay = $('#search');
        this.searchInput = $('#search > form > input[type="search"]'); 
        this.events();
        this.isOverlayOpen = false;
        this.typingTimer;
    }
   
    //events
    events() {
        this.openButton.on('click', this.openOverlay.bind(this));
        $(document).on('keydown', this.keyPressDispatcher.bind(this));
        this.searchInput.on('keydown', this.typingLogic.bind(this));
        this.closeButton.on('click', this.closeOverlay.bind(this));
    }

    //methods
    typingLogic() {
        clearTimeout(this.typingTimer);
        this.typingTimer = setTimeout(() => {
            const url = 'fetch.php';
            fetch(url, {
                headers: {
                    "Accept" : "application/json",
                    "Content-Type" : "application/json"
                },
                'method' : "POST",
                "body" : JSON.stringify({'name' : 'Jupiter'})
            })
            .then((response) => 
                response.json()
             )
            .then(response => {
                const data = response.data;
                const dataObject = JSON.parse(data);
                console.log(dataObject);
            });
        }
            , 1500);
    }

    keyPressDispatcher(e) {
        // pressing 's' opens overlay
        if (e.keyCode == '83' && !this.isOverlayOpen) {
            this.openOverlay();
        // pressing 'esc' closes overlay
        } else if (e.keyCode == '27' && this.isOverlayOpen) {
            this.closeOverlay();
        }
    }


    openOverlay() {
        event.preventDefault();
        this.searchOverlay.addClass('open');
        $('#search > form > input[type="search"]').focus();
        this.isOverlayOpen = true;

        // $('a[href="#search"]').on('click', function(event) {
        //     event.preventDefault();
        //     $('#search').addClass('open');
        //     $('#search > form > input[type="search"]').focus();
        // });
    }
    

    closeOverlay() {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            this.searchOverlay.removeClass('open');
        }

        this.isOverlayOpen = false;
        // $('#search, #search button.close').on('click keyup', function(event) {
        //     if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
        //         $(this).removeClass('open');
        //     }
        // });
    }
}

export default Search;