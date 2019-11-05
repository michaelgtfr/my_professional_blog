
CREATE TABLE user (
                id INT AUTO_INCREMENT NOT NULL,
                name VARCHAR(40) NOT NULL,
                first_name VARCHAR(40) NOT NULL,
                confirmation BOOLEAN NOT NULL,
                validation BOOLEAN NOT NULL,
                email VARCHAR(100) NOT NULL,
                photo VARCHAR(255),
                presentation VARCHAR(255),
                password VARCHAR(20) NOT NULL,
                role VARCHAR(20) NOT NULL,
                date_create DATETIME NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE blog_posts (
                id INT NOT NULL,
                autor INT NOT NULL,
                validate_blog_post BOOLEAN NOT NULL,
                title VARCHAR(255) NOT NULL,
                chapo LONGBLOB NOT NULL,
                content TEXT NOT NULL,
                date_update DATETIME NOT NULL,
                date_create DATETIME NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE blog_post_update (
                id INT NOT NULL,
                blog_post_id INT NOT NULL,
                author INT NOT NULL,
                title VARCHAR(255) NOT NULL,
                chapo LONGBLOB NOT NULL,
                content TEXT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE picture (
                id INT NOT NULL,
                update_post BOOLEAN NOT NULL,
                blog_posts_id INT NOT NULL,
                name VARCHAR(50) NOT NULL,
                extention VARCHAR(10) NOT NULL,
                description VARCHAR(100) NOT NULL,
                PRIMARY KEY (id, update_post)
);


CREATE TABLE comment (
                id INT AUTO_INCREMENT NOT NULL,
                blog_post_id INT NOT NULL,
                validation BOOLEAN NOT NULL,
                date_create DATETIME NOT NULL,
                author VARCHAR(40) NOT NULL,
                email VARCHAR(100) NOT NULL,
                content VARCHAR(255) NOT NULL,
                PRIMARY KEY (id)
);


ALTER TABLE blog_posts ADD CONSTRAINT user_blog_posts_fk
FOREIGN KEY (autor)
REFERENCES user (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE blog_post_update ADD CONSTRAINT user_blog_post_update_fk
FOREIGN KEY (author)
REFERENCES user (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE comment ADD CONSTRAINT article_du_blog_commentaire_fk
FOREIGN KEY (blog_post_id)
REFERENCES blog_posts (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE picture ADD CONSTRAINT blog_posts_picture_fk
FOREIGN KEY (blog_posts_id)
REFERENCES blog_posts (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE blog_post_update ADD CONSTRAINT blog_posts_blog_post_update_fk
FOREIGN KEY (blog_post_id)
REFERENCES blog_posts (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE picture ADD CONSTRAINT blog_post_update_picture_fk
FOREIGN KEY (blog_posts_id)
REFERENCES blog_post_update (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
