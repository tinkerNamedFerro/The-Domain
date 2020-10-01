@extends('layouts.app')
@section('title')
    Documenation
@endsection
@section('content')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

<div class="container">
    <h1>Requirements and Development Breakdown</h1>
    <br>
    @markdown
### Requirements
* User login with account type (member, curator and admin)
- [x] Display user details at top of page and logout
- [x] Adding book
	- [x] Uniquie book title 
	- [x] Restricted to curator
	- [x] Auther = (firstName, lastName)
	- [x] Book genres (pregen)
	- [x] Year between (1700, 2021)
- [x] updating and deleting book 
	- [x] Only curator
	- [x] Old values should be displayed
	- [x] Delete book
- [x] Adding review for book
	- [x] Can be done by anyone logged in 
	- [x] written text > 5 length
	- [x] rating between 1 and 5 
	- [x] One rating per user per book 
- [x] List books 
	- [x] Display book title, authors names  
	- [x] Clicking on book will show all details and reviews 
	- [x] Reviews should show date, name, review text and rating
	- [x] Reviews are paginated with at most 5 reviews per page 
- [x] Reviewers can update their review
- [x] Search bar with title, author, genre and year 
	- [x] Partial search genre, yeear, title, author
- [ ] Add approiate css and formatting
### Additional Requirement
- [x] Image upload storing base64 in db 
	- [x] SQL coulmn type for base64
- [x]   **Many to Many relationship between Author and book**
	- [x]   Author DOB and Nationality 
	- [x]   Dyamic form for update and creation of books 
	- [x]   When deleting book delete author if not in other books 
- [x]   Curator approval from administrator 
	- [x]   Unapproved status should be shown 
	- [x]   List of unapproved people for buttons to activate 
- [ ] Recommand books to logged in user 
- [ ] 5 books with the highest average rating in the last 30 days
- [ ] Add for seed data by using iseed [link](https://github.com/orangehill/iseed)
## Role Permissions
* **Guest**: can view books and reviews 
* **User**: can make reviews 
* **Curators**: can make add books to the list 

## Steps 
* Design
	- [x] make ER diagram [link](https://online.visual-paradigm.com/app/diagrams/#diagram:proj=0&type=ERDiagram)
	- [x] Make project 
	- [x] Load auth [[User Authentication]]
		- [x] Have emails sent to ogs 
* Migrations 
	
	- [x] Make migrations [link](https://laravel.com/docs/7.x/migrations#creating-columns)
		- [x] User
		- [x] Authors
		- [x] Books
		- [x] Reviews
		- [x] authors_books_table [[Migrations and DB & Queries## Many to Many Relationship]] 
* Seeders 
	 - [x] Users
	 - [x] Authors
	 - [x] Books
	 - [x] Reviews
	 - [x] authors_books_table
* Test login
	- [x] Show account role in top right
* Registration  (add parameters to $fillable in User model)
	- [x] Add role to form (backend and frontend)
	- [x] Change validation for account generation password can be 4 or more
	- [x] Add Role selection custom validation 
	- [x] Depending on role split status logic
* Models
	- [x] Users
	- [x] Authors
	- [x] Books
	- [x] Reviews 
	- [x] authors_books
* Add books controller [[Models]]
	- [x] Auth check ("Curator" AND "Approved") (Frontend) and (Backend)
	- [x] Add constant file for book genres [laravel const file](https://stackoverflow.com/questions/42155536/what-is-the-best-practice-for-adding-constants-in-laravel-long-list)
	- [x] Genre custom validator 
	- [x] validation for other parameters
	- [x] Make db entries 
   - [ ] ~~ Add book form (dyamic amount of authors [link](https://www.itsolutionstuff.com/post/laravel-dynamically-add-or-remove-input-fields-using-jqueryexample.html)[quality example](https://stackoverflow.com/questions/54674454/laravel-submit-dynamically-generated-form-fields)~~ Not using this approach
   * Multiple Authors
   	- [x] Add list of all authors using select2
   	- [x] Add onclick event to add author input element to list with name = {author_{id}}
   	- [x] Add x button to remove author 
   	- [x] Add button underneath select form field to add new author 
   	- [ ] ~~  send all form data to book to new author to repopulate the form when returning ~~
   	- [x] Or store book form data in session and clean at end of book creation [link](https://laravel.com/docs/8.x/session)
   	- [ ] If book form isn't complete clean authors on each new book creation and end of book creation 
   	- [x] Add another submit button to add existing form data to session [link](https://laracasts.com/discuss/channels/laravel/how-do-i-handle-multiple-submit-buttons-in-a-single-form-with-laravel)
   	- [x] Redirect to author creation form 
   	- [x] Add authorController [[Routes and Controller]]
   	- [x] Move author validation over 
   	- [x] Add custom error message if author exists
    - [x] Show books 
    - [ ] **Add bootstrap datetime picker ( IF TIME )**
* Edit Multiple Authors
- [x] Add book id to session when loading edit form 
- [x] Use book_id in sessions to redirect to sessions form after author edit/add
- [ ] Add author add and create to book edit form 
- [x] Change edit book controller logic to handle multiple authors
- [x] Add remove author button and use jquery to make delete [link](https://laracasts.com/discuss/channels/laravel/delete-method-with-href)
* Delete book
- [x] Get all author book linked table entry where book_id
- [x] Check number of author_book_link table each author has
- [x] If author_row == 1 delete, delete link and author 
- [x] else delete link
- [x] delete all comments 
- [x] delete book 
* show book details page
	- [x] List basic book info 
	- [x] Add edit form 
	- [x] Edit form inital values ['link'](https://stackoverflow.com/questions/38461677/what-is-the-best-practice-to-show-old-value-when-editing-a-form-in-laravel)
	```javascript
	value="{{ old('type', $template->type ?? 'banana') }}"
	```
	- [x] custom validation for changing title 
* Add review controller   [[Routes and Controller]]
	 - [x] add button to book review
	 - [x] Add form parameters
	 - [x] Add hidden input for book id 
	 - [x] Change writen_text to text area 
	 - [x] Add validation to strings 
	 - [x] Add to DB 
	 - [x] Modify create_form for review to be able to edit 
* Show reviews in book details 
	- [x] Check user id and currently signed in user. (display edit button if match)
	- [x] Add paginated of reviews
	- [x]  Add book and review seeders
* Book Filter
	- [x]  Add bootstrap search bar form in book **Inline forms** [link](https://getbootstrap.com/docs/4.3/components/forms/)
	- [x]  Change 'Laravel' nav to go to book
	- [x]  Make Custom route for filter in book controller [link](https://stackoverflow.com/questions/16661292/add-new-methods-to-a-resource-controller-in-laravel)
	- [x]  419 Page Expired (missing CRSF token [link](https://www.phpclasses.org/blog/post/896-5-Common-Laravel-Request-Errors-Which-Aunt-New-PHP-Developers.html#:~~:text=Error%20419%20or%20Page%20Expired,be%20handled%20by%20another%20controller.))
	- [x]  Create book filter route
	- [x]  Add valdidation to book search route
	- [x]  Redirect to index with url parmeters
	- [x]  Change book index to url parameters
* Admin curator approval
	- [x]  Add admin panel to list all pending curators 
	- [x]  Change curator to pending
* Book Image upload
	- [x] Added image upload to books
	- [ ] Add image upload to book edit
* Adding css to comments 
	- [ ] Add picture to book review page 
	- [ ] Add name and updated_at date to comment 
	- [ ] Add Additional comments to books 
	- [x] Use iseed to add to seeder
* Highest rating in the last 30 days 
	-  [x] Get all books and sortByDesc and get average [link](https://stackoverflow.com/questions/19262968/laravel-4-return-average-score-from-within-model) 
	-  [x] Query for reviews in the last 30 days [link](https://stackoverflow.com/questions/49342407/laravel-show-users-from-the-last-30-days)
	-  [x] Add Recommended page
	-  [ ] (Possible) Add other books the user hasn't read 
	-  [ ] (Possible) get new list of four every time every reload 
* EXTRA FUNCTIONAL AUTOMATIC BOOK DOWNLOADER
	* Use web scrapper to parse http://libgen.rs/ to get books
    - [ ] Setup laravel web scrapper [link](https://github.com/FriendsOfPhp/Goutte)
    - [ ] Extra docs for webcrawler [link](https://symfony.com/doc/current/components/dom_crawler.html?any)
* Employability reflection 
	![picture alt](https://i.ibb.co/jMTK9DF/Employability-reflection.jpg)
   1. Get list of non-technical skills/capabilities in my industry
   	* Time Management
		* Document Everything
		* Prioritise
		* Plan ahead
   	* Team work
		* Value Your Team Members
   	* Communication
   		*You can get deep in a technical talk and then take that conversation to a higher level and make the complicated simple [seek](https://www.seek.com.au/job/50611373?type=standard#searchRequestToken=44a46608-1711-4df8-a6a1-76c70d705771)
   	* Critical Thinking
		*You're a natural-born problem solver. You use your critical thinking skills to quickly identify any issues and fix them immediately [seek](https://www.seek.com.au/job/50611373?type=standard#searchRequestToken=44a46608-1711-4df8-a6a1-76c70d705771)
   	* Emotiional Intelligence
   		* You are passionate about technology and digging in to find out the whys and what fors on how things work
   		* You’re proactive and self-motivated. Not only do you take the initiative to come up with new ideas and strategies, you’re able to see them through to implementation. And you need only minimal guidance to get the job done [seek](https://www.seek.com.au/job/50611373?type=standard#searchRequestToken=44a46608-1711-4df8-a6a1-76c70d705771)
   		* Good People skills.
   		* Must be Personable.
   		* Don’t hesitate to Put Forward Ideas
   		* 
		 - [ ] Seek
		 - [ ] Linkined
		 - [x]  Investigation of the Australian Computer Society [“Core Book of Knowledge”](https://www.researchgate.net/publication/265654324_The_Australian_Computer_Society_Inc_The_ACS_Core_Body_of_Knowledge_for_Information_Technology_Professionals)
		 * Software Development Life-cycle methodologies,
	2. Identify five (5) of the skills/capabilities that are most relevant for you and justify your choice (explain why these skills are important to you). Record these skills in the table (below) and include your justification and the research you conducted to determine this skill/capability is valued in the ICT industry. Dot points are appropriate for this part of the task.
	3. Reflect on your experiences in 2703ICT / 7005ICT and select specific evidence for each of the skills/capabilities you have identified as important. Remember to consider the way you have learned and the types of assessments you have completed, not just what you learned. Try to draw from diverse experiences within the course rather than drawing all of your evidence from one activity or assessment
	4. Write a short evidence statement for each skill/capability (maximum 40 words) per statement. Copy/Use the table (below) to help you structure your responses. Your evidence statements should be written in full, with appropriate professional language and sentence structure.  Example:

			“Strong professional communication skills best evidenced through interaction with industry professionals at a seminar during my first year at university. My connection with these professionals was enhanced and sustained by ongoing communication via LinkedIn.”
		![picture alt](https://i.ibb.co/ctCHGbw/Screenshot-from-2020-09-28-16-25-36.png "Title is optional")
		![picture alt](https://i.ibb.co/8XG1Zw8/Screenshot-from-2020-09-28-16-28-58.png "Title is optional")
		


## Assumptions 
* Curator and Author are two different people. 
* Author is static data not linked to account 
* The highest rating in the last 30 days is based on review date as old books can have resurgence

## Notes 
Dyamics forms cannot be added  

* making dynamic forms with jquery in laravel has its drawbacks most notably the inability to use error messaging or any of the precompiled blade funtionality laravel supports.
* Because of this I'm annoying adding jquery dyamics fields to book create. Instead having a dropdown field with all authors and the ability to add new ones

ics fields to book create. Instead having a dropdown field with all authors and the ability to add new ones -->
    @endmarkdown
</div>
@endsection