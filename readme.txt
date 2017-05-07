TO BE DONE:
->the timer of remaining days 
->fill the disscutions page
->comment ability to discussions
->fill the characters table
->about us bla 
->a page 4 interesting related videos and links
->list of episodes!!not that important
->put the trailer in main page
->add small details and complete validation sign up
->admin page (add character - whatsoever)
->add coins to users when add discussions and upvote and then they can purchase fragons and diwolfs HO HO HOOOO ohoh and and comment ability to discussions probably I shound move the comment thingy to 3rd step or copy it ...copies;)
->the 4 pics main page bla bla 
->custmize page bla bla 
+
remove things i didnt use 
remove margins l saro zyadi
contact us !!!
++
delete remaining files in temp
+++
add loading when needed
++++++
change query to get 3 cimments
select bla from ( select bla)

sql ops:
CREATE TABLE upvotes(dis_id int,name varchar(20))
alter table upvotes add CONSTRAINT pk PRIMARY KEY(dis_id,name);
alter table upvotes add CONSTRAINT fk1 FOREIGN KEY(dis_id) REFERENCES discussions ON DELETE CASCADE;
alter table upvotes add CONSTRAINT fk2 FOREIGN KEY(name) REFERENCES users;

CREATE TABLE downvotes(dis_id int,name varchar(20))
alter table downvotes add CONSTRAINT pk PRIMARY KEY(dis_id,name);
alter table downvotes add CONSTRAINT fk1 FOREIGN KEY(dis_id) REFERENCES discussions ON DELETE CASCADE;
alter table upvotes add CONSTRAINT fk2 FOREIGN KEY(name) REFERENCES users;

DELIMITER $$
CREATE TRIGGER update_upvotes AFTER INSERT ON upvotes
       FOR EACH ROW
       BEGIN
           UPDATE discussions SET upvotes=upvotes+1 WHERE dis_id=NEW.dis_id;

    END$$

DELIMITER ;

DELIMITER $$
CREATE TRIGGER update_downvotes AFTER INSERT ON downvotes
       FOR EACH ROW
       BEGIN
           UPDATE discussions SET downvotes=downvotes+1 WHERE dis_id=NEW.dis_id;

    END$$

DELIMITER ;

//ondelete
DELIMITER $$
CREATE TRIGGER decrement_downvotes AFTER delete ON downvotes
       FOR EACH ROW
       BEGIN
           UPDATE discussions SET downvotes=downvotes-1 WHERE dis_id=OLD.dis_id;

    END$$

DELIMITER ;
DELIMITER $$
CREATE TRIGGER decrement_upvotes AFTER delete ON upvotes
       FOR EACH ROW
       BEGIN
           UPDATE discussions SET upvotes=upvotes-1 WHERE dis_id=OLD.dis_id;

    END$$

DELIMITER ;