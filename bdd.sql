#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_user   int (11) Auto_increment  NOT NULL ,
        lastName  Varchar (255) ,
        firstName Varchar (255) ,
        avatar    Varchar (255) ,
        email     Varchar (255) NOT NULL ,
        pwd       Varchar (255) NOT NULL ,
        birthDate Datetime ,
        id_roles  Int ,
        PRIMARY KEY (id_user )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: roles
#------------------------------------------------------------

CREATE TABLE roles(
        id_roles int (11) Auto_increment  NOT NULL ,
        roleName Varchar (255) NOT NULL ,
        PRIMARY KEY (id_roles )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: activities
#------------------------------------------------------------

CREATE TABLE activities(
        id_activity  int (11) Auto_increment  NOT NULL ,
        lastName     Varchar (25) ,
        description  Text ,
        dateActivity Datetime ,
        reccurence   Int ,
        prix         Int ,
        vote_enable  Int NOT NULL ,
        place        Varchar (25) ,
        PRIMARY KEY (id_activity )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pictures_activity
#------------------------------------------------------------

CREATE TABLE pictures_activity(
        id_picture_activity int (11) Auto_increment  NOT NULL ,
        path                Varchar (512) ,
        datePictureActivity Datetime ,
        id_activity         Int ,
        id_user             Int ,
        PRIMARY KEY (id_picture_activity )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comments
#------------------------------------------------------------

CREATE TABLE comments(
        id_comment          int (11) Auto_increment  NOT NULL ,
        content             Text ,
        dateComment         Datetime ,
        id_picture_activity Int ,
        id_user             Int ,
        PRIMARY KEY (id_comment )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: likes
#------------------------------------------------------------

CREATE TABLE likes(
        id_like             int (11) Auto_increment  NOT NULL ,
        id_user             Int ,
        id_picture_activity Int ,
        PRIMARY KEY (id_like )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: activities_vote
#------------------------------------------------------------

CREATE TABLE activities_vote(
        id_activity_vote int (11) Auto_increment  NOT NULL ,
        dateVote         Datetime ,
        id_user          Int ,
        id_activity      Int ,
        PRIMARY KEY (id_activity_vote )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: activities_subscribes
#------------------------------------------------------------

CREATE TABLE activities_subscribes(
        id_activity_subscribe int (11) Auto_increment  NOT NULL ,
        id_user               Int ,
        id_activity           Int ,
        PRIMARY KEY (id_activity_subscribe )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: suggestions
#------------------------------------------------------------

CREATE TABLE suggestions(
        id_suggestion  int (11) Auto_increment  NOT NULL ,
        content        Text ,
        dateSuggestion Datetime ,
        id_user        Int ,
        PRIMARY KEY (id_suggestion )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: products
#------------------------------------------------------------

CREATE TABLE products(
        id_product  int (11) Auto_increment  NOT NULL ,
        img         Varchar (25) ,
        title       Varchar (25) ,
        price       Int ,
        description Text ,
        quantity    Int ,
        id_category Int ,
        PRIMARY KEY (id_product ) ,
        UNIQUE (img ,title )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: category
#------------------------------------------------------------

CREATE TABLE category(
        id_category  int (11) Auto_increment  NOT NULL ,
        categoryName Varchar (25) ,
        PRIMARY KEY (id_category )
)ENGINE=InnoDB;

ALTER TABLE users ADD CONSTRAINT FK_users_id_roles FOREIGN KEY (id_roles) REFERENCES roles(id_roles);
ALTER TABLE pictures_activity ADD CONSTRAINT FK_pictures_activity_id_activity FOREIGN KEY (id_activity) REFERENCES activities(id_activity);
ALTER TABLE pictures_activity ADD CONSTRAINT FK_pictures_activity_id_user FOREIGN KEY (id_user) REFERENCES users(id_user);
ALTER TABLE comments ADD CONSTRAINT FK_comments_id_picture_activity FOREIGN KEY (id_picture_activity) REFERENCES pictures_activity(id_picture_activity);
ALTER TABLE comments ADD CONSTRAINT FK_comments_id_user FOREIGN KEY (id_user) REFERENCES users(id_user);
ALTER TABLE likes ADD CONSTRAINT FK_likes_id_user FOREIGN KEY (id_user) REFERENCES users(id_user);
ALTER TABLE likes ADD CONSTRAINT FK_likes_id_picture_activity FOREIGN KEY (id_picture_activity) REFERENCES pictures_activity(id_picture_activity);
ALTER TABLE activities_vote ADD CONSTRAINT FK_activities_vote_id_user FOREIGN KEY (id_user) REFERENCES users(id_user);
ALTER TABLE activities_vote ADD CONSTRAINT FK_activities_vote_id_activity FOREIGN KEY (id_activity) REFERENCES activities(id_activity);
ALTER TABLE activities_subscribes ADD CONSTRAINT FK_activities_subscribes_id_user FOREIGN KEY (id_user) REFERENCES users(id_user);
ALTER TABLE activities_subscribes ADD CONSTRAINT FK_activities_subscribes_id_activity FOREIGN KEY (id_activity) REFERENCES activities(id_activity);
ALTER TABLE suggestions ADD CONSTRAINT FK_suggestions_id_user FOREIGN KEY (id_user) REFERENCES users(id_user);
ALTER TABLE products ADD CONSTRAINT FK_products_id_category FOREIGN KEY (id_category) REFERENCES category(id_category);


INSERT INTO `activities` (`id_activity`, `lastName`, `description`, `dateActivity`, `reccurence`, `prix`, `vote_enable`, `place`) VALUES
(1, 'surf', 'Du surf', '2010-04-02 15:28:22', 0, 10, 0, 'lol mdr'),
(2, 'surff', 'Du surff', '2010-04-02 15:28:22', 0, 10, 0, 'lol mdr'),
(3, 'surg', 'Du surg', '2010-04-02 15:28:22', 0, 10, 0, 'lol mdr'),
(4, 'sur1', 'Du sur1', '2010-04-02 15:28:22', 0, 10, 0, 'lol mdr'),
(5, 'sur2', 'Du sur2', '2010-04-02 15:28:22', 0, 10, 0, 'lol mdr'),
(6, 'sur3', 'Du sur3', '2010-04-02 15:28:22', 0, 10, 0, 'lol mdr'),
(7, 'sur4', 'Du sur4', '2010-04-02 15:28:22', 0, 10, 0, 'lol mdr'),
(8, 'sur5', 'Du sur5', '2010-04-02 15:28:22', 0, 10, 0, 'lol mdr');

INSERT INTO `roles` (`id_roles`, `roleName`) VALUES 
(NULL, 'admin'),
(NULL, 'user');

INSERT INTO `users` (`id_user`, `lastName`, `firstName`, `avatar`, `email`, `pwd`, `birthDate`, `id_roles`) VALUES 
(NULL, 'admin', 'admin', 'view/images/avatar/default.png', 'admin@admin.admin', 'admin', NULL, '1');

INSERT INTO `pictures_activity` (`id_picture_activity`, `path`, `datePictureActivity`, `id_activity`, `id_user`) VALUES 
(NULL, 'http://chan.catiewayne.com/c/src/138578149239.png', '2017-04-13 00:00:00', '1', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '1', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '1', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '1', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '1', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '1', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '1', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '1', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '1', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '1', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '1', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '1', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '1', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '2', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '2', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '2', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '2', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '2', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '3', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '3', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '3', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '4', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '4', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '5', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '6', '1'),
(NULL, 'http://placehold.it/200x200', '2017-04-13 00:00:00', '7', '1');