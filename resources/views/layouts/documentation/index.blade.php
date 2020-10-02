@extends('layouts.app')
@section('title')
    Documenation
@endsection
@section('content')

<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script> -->

<div class="container">
    <h1>Web Application Development Assignment 2 Documentation</h1>
    <a href="{{ route('requirements') }}"><button class="btn btn-primary" type="button">View Requirements and Development Breakdown</button></a>
    <br><br>
    @markdown
    ## Reflection
    This project was a great summarisation of my experience learning Laravel. I started with the impression that PHP/Laravel was an outdated language only used by developers that are maintaining old software. I was pleasantly surprised with all the functionality and automation that laravel offers and I see it a very compelling option for any full stack developer who wants to quickly develop their ideas.

    This project incorporated numerous different libraries for front-end and back-end that can easily translated to other projects in the future. I personally found the use of the css framework halfmoon to be extremely useful in creating a webapp that could easily switch between dark/lite mode. Another notable functionality was Markdown render which is my primary note keeping to allow for easy refer of documentation.
    ## Areas in The Domain I want to develop
    * Unit testing
    * Deployment 
    * REST api development
    * Look into a more accurate rating system following this paper [link](http://ranjithakumar.net/resources/sort_by_ratings.pdf)

    ## Employability reflection 
    Below is a table containing the non-technical skills I possessed. I found this introspection quite rewarding as it laid a foundation, which enlightened strengths that I hadn't quantified, and gaps the need work. 
    @endmarkdown
    <img src="https://i.ibb.co/jMTK9DF/Employability-reflection.jpg" alt="drawing" width="800"/>
    @markdown

    ## ERR DIAGRAM
    The design of this database was fairly straightforward as it heavily mimicked the design of the DB in assignment 1.  With the use of eloquent, the database is design had outstanding benefits due to the easy querying of foreign keys for all table relationships. 

    ![picture alt](https://i.ibb.co/DKpRtDG/Untitled-Diagram-vpd.png)
    ### Shortcomings
    Although I took a significant amount of time planning the UX of this webapp, there were shortcomings in the UI due to time constraints and it not being the major focus in the marking criteria.  However upon reflection I believe the identification of core requirements and subtraction of non-essentials is crucial to the delivery of products have have time or cost constraints.
    @endmarkdown
</div>
@endsection