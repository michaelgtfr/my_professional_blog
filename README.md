# My professional blog

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/93291baa746f45d7ae67a5859936cd8f)](https://app.codacy.com/app/michaelgtfr/my_professional_blog?utm_source=github.com&utm_medium=referral&utm_content=michaelgtfr/my_professional_blog&utm_campaign=Badge_Grade_Settings)

My professional blog for my project five of my study on openclassroom

## Context

The project is to create my own professional blog. This web site is broken down into two large groups of pages:

  -Useful pages for all visitors  
  -The pages that allow you to administer your blog  
  
Here is the list of pages that will have to be accessible from your website:
  
  -The home page  
  -The page listing all of the blogs posts
*  The page displaying a blog post     
*  The page for adding a blog post     
*  The page for editing a blog post      
*  The pages that allow you to edit/delete a blog post     
*  Login/user Registration pages     
  
We will develop an administration part that will have to be accessible only to registered and validated users.  
The administration pages will therefore be accessible on conditions and ensure the security of the administration part.  

The following information must be presented on the home page:  

*  Your first and last name      
*  A photo and/or a logo     
*  A catch phrase that looks like you (example: "Martin Durand, the developer you need!")      
*  A menu for navigating through all the pages of your website     
*  A contact form (at the submission of this form, an email with all this information will be sent to you) with the following fields:           
  *  Surname/First Name        
  *  Contact email     
  *  Message      
*  A link to your CV in PDF format     
*  And all the links to social networks where we can follow you (Github, LinkedIn, Twitter...)     

On the page listing all blogs posts (from the newest to the oldest), you have to display the following information for each blog post:  

*  The title     
*  The date of last modification     
*  The Châpo     
*  And a link to the blog post     
  
On the page detailing a blog post, you have to display the following information:  

*  The title     
*  The Chapo     
*  Content     
*  The author      
*  The last update date      
*  The form for adding a comment (submitted for validation)      
*  Lists of validated and published comments     
  
On the page for editing a blog post, the user has the option to edit the title, Chapo, author and content fields.     
In the footer menu, it must include a link to access the administration of the blog.  
Important: You will ensure that there are no security vulnerabilities (XSS, CRSF, SQL injection, session hijacking,...).  

## Installation

### Prerequisite

*  Offer accommodation on a hosting      
*  Have a domain name that will be the address on which your site will be accessible     
*  Have its ID on its hosting (host, password, Identifying)      
*  Have installed an FTP on his computer       
  
### Site installation
(Example with FileZilla but all FTP works on the same principle)  

  Open your FTP software. Cliquez sur le logo " Gestionnaire of site". A window opens. Click on "New Site" and give it the name you want (example: "My Site"). To the right, you will have to indicate (the IP address, password and its username). Click Connect.  
  !Warning a message warns you after you click Connect you tell yourself if you are connecting or not.  
  After connecting, double-click in the left window on the files or click-Drop the folders in the right window that you want to send to the server. As soon as it appears in the right window, it was sent to your server.  
  !Please note that your home page should be appelleindex. html. This is the page that will be loaded when a new visitor arrives on your site.  
  
## Database installation

### Prerequisite

*  The IP address of the MySQL server      
*  Your MySQL Login      
*  Your MySQL password     
*  The name of the database, if it has already been created      
*  The PhpMyAdmin address that allows you to manage your online database     
  
### Access

   Changed the parameter file of the database (Config/ConfigPDO.php). Now that it's done, your scripts have access to the host database.
   !If your table is still empty, you have to use the phpMyAdmin that the hosting puts at your disposal to recreate the tables. On your machine, go to your local phpMyAdmin. Use it to export all your tables. This will create a. sql file on your hard disk that will contain your tables. Then go to the phpMyAdmin address of your host. Once there, use the Import feature to import the. sql file that is on your hard disk. Your tables are now loaded on the host's MySQL server.  
   
   __Site installation Complete__
