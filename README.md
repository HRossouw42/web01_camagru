# web01_camagru

## Disclaimer
*This was my first attempt at any web development, before this point it was pure C.*  

Combine a very short deadline with innexperience and you get this. **Expect 🐞's.** Sanitization is rare - this is a rookie project through and through.  

Still, looking at it 2 years later, I learned a lot from it. Make mistakes early, fail fast, improve constantly.

## What is it?
Web Application for superimposing images, either by uploading file or using a webcam. First web module at WeThinkCode_  

It's a rough instagram clone with a home feed for users to like and comment on each others pictures.

## Features
- register & login 
  - with email verification that generates a unique token that the user must activate via a link
- user can modify information via personal page
- email notifications
- add, edit and delete photos via webcam or uploaded images
- 'filters' and 'stickers' for photos
- public feed of all user photos
  - pagination
  - likes & comments
- logout

## Toolset
Prescribed languages - MAMP Stack: PHP, HTML, Apache web server, mySQL database
Bulma CSS framework  

## Installation
- install MAMP, use password of **123456** for the database
- clone files to Apache web server's htdocs directory
- create database called **camagru** on phpmyadmin
- open http://localhost:8080/ (or wherever it's running)

# Example

1st year project examples incoming 😅:  

Main Page - you can't post if you haven't registed, but still see public posts
![Main Page](https://github.com/HRossouw42/web01_camagru/blob/master/image_mainPage.jpg)

Capure Page - take photos with your frontfacing camera, add filters
![Capture Page](https://github.com/HRossouw42/web01_camagru/blob/master/image_capture.jpg)

Shown when clicking on a post - can comment/like if logged in
![Comments Page](https://github.com/HRossouw42/web01_camagru/blob/master/image_comments.jpg)


### Other WTC Students
**Use this implementation at your own peril. Definitly a tough project for your first time touching web, but you'll learn a lot!**
