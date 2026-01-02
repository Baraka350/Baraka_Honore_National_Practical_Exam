# Baraka_Honore_National_Practical_Exam
Food Stock Management System (PHP & MySQL)
Project Overview

The Food Stock Management System is a web-based application developed using PHP and MySQL.
The system is designed to manage food items, record food imports and exports, and keep a history of changes for accountability and transparency.

This project was developed as part of a National Practical Examination and demonstrates practical skills in web development, database management, and user interface design.

Objectives

Register food items with owner information

Record food import and export transactions

Display food history with creation and update dates

Prevent unauthorized deletion of records

Provide a clean, simple, and user-friendly interface

#Technologies Used

HTML5

CSS3

PHP

MySQL

Apache Server (XAMPP)

Project Structure

Baraka_Honore_National_Practical_Exam/

assets/
css/
style.css

auth/
logout.php

config/
db.php

dashboard/
index.php

foods/
add.php
edit.php
view.php

transactions/
import.php
export.php

README.md

Database Design
Database Name

food_stock_db

Tables Description

foods table

Food_Id (Primary Key)

Food_Name

Food_OwnerName

Created_At

Updated_At

import table

Food_Id

ImportDate

Quantity

export table

Food_Id

ExportDate

Quantity

Installation and Setup

Install XAMPP on your computer

Start Apache and MySQL from the XAMPP Control Panel

Open phpMyAdmin in your browser
http://localhost/phpmyadmin

Create a database named food_stock_db

Create the required tables using the provided SQL queries

Copy the project folder into:
C:\xampp\htdocs\

Open the browser and run the project:
http://localhost/Baraka_Honore_National_Practical_Exam

System Features

Add new food items

View registered food items

Edit food information

Automatic tracking of food creation date

Automatic tracking of last update date

Import food quantities

Export food quantities

View import and export history

Read-only transaction records

No delete functionality to protect data integrity

How the System Works

When a food is added, the system automatically records the date it was created.
When a food is edited, the system automatically updates the last modified date.
Import and export records are stored separately and displayed as read-only tables.
This ensures accountability and proper tracking of food stock activities.

Examiner Explanation

This system manages food stock by registering food items, recording import and export transactions, and maintaining an audit trail using timestamps. The design ensures data integrity, accountability, and ease of use.

Conclusion

The Food Stock Management System demonstrates effective use of PHP and MySQL, proper database structuring, clean user interface design, and practical stock management concepts suitable for academic evaluation and real-world use.

Author

Name: Baraka Honore
Project: National Practical Examination
Field: Software Development
