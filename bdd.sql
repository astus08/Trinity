#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_user   int (11) Auto_increment  NOT NULL ,
        lastName  Varchar ,
        firstName Varchar ,
        avatar    Varchar ,
        email     Varchar (25) NOT NULL ,
        password  Varchar NOT NULL ,
        birthDate Datetime ,
        id_roles  Int ,
        PRIMARY KEY (id_user ) ,
        UNIQUE (email )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: roles
#------------------------------------------------------------

CREATE TABLE roles(
        id_roles int (11) Auto_increment  NOT NULL ,
        roleName Varchar (25) NOT NULL ,
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
        path                Varchar (25) ,
        datePictureActivity Datetime ,
        id_activity         Int ,
        id_user             Int ,
        PRIMARY KEY (id_picture_activity ) ,
        UNIQUE (path )
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
