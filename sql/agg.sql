select 
released_year as year,
count(released_year) as '# books',
avg(pages) as 'avg pages'
from books
group by released_year
order by released_year;




