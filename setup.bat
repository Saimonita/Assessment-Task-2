1.	@echo off
2.	echo Starting Project Setup...
3.	
4.	:: 1. Create the main folder
5.	mkdir My_New_Web_App
6.	cd My_New_Web_App
7.	
8.	:: 2. Create sub-folders
9.	mkdir css
10.	mkdir js
11.	mkdir images
12.	
13.	:: 3. Create blank files (The "type nul" trick creates an empty file)
14.	type nul > index.html
15.	type nul > css\style.css
16.	type nul > js\script.js
17.	type nul > README.md
18.	
19.	echo Setup Complete! Your project is ready.
20.	Pause
