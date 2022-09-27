CREATE TABLE article (
  id int primary key auto_increment NOT NULL ,
  title varchar(150) NOT NULL,
  description varchar(300) NOT NULL,
  picture varchar(150) NOT NULL,
  content text NOT NULL,
  url varchar(150) NOT NULL,
  time int(11) NOT NULL
);

