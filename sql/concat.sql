select
    concat(substring(title, 1,  10), "...") as "short title",
    concat(author_lname, ",", author_fname) as "author",
    concat(stock_quantity, " in stock") as "quantity"
     
from books
where substring(title, 1, 1) = 'a';
