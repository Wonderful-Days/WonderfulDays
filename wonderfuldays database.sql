CREATE TABLE tbl_user_basic (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    country_code VARCHAR(5),
    phone VARCHAR(20),
    email VARCHAR(255) NOT NULL UNIQUE,
    address VARCHAR(255),
    zipcode INT,
    country VARCHAR(45),
    state VARCHAR(45),
    password VARCHAR(255) NOT NULL,
    createdon DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tbl_user_detail (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    user_basic_id INT,
    profile_picture VARCHAR(255),
    name VARCHAR(255),
    bio_short_desc TEXT,
    college_id VARCHAR(255),
    company_name VARCHAR(255),
    designation VARCHAR(255),
    hobbies TEXT,
    social_facebook VARCHAR(255),
    social_instagram VARCHAR(255),
    social_x VARCHAR(255),
    social_youtube VARCHAR(255),
    social_linkedin VARCHAR(255),
    createdon DATETIME DEFAULT CURRENT_TIMESTAMP,
    updatedon DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_basic_id) REFERENCES tbl_user_basic(ID)
);

CREATE TABLE tbl_events_master (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    event_shortname VARCHAR(255) NOT NULL,
    event_name VARCHAR(255) NOT NULL,
    event_default_day VARCHAR(255),
    createdon DATETIME DEFAULT CURRENT_TIMESTAMP,
    updatedon DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE tbl_events (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    mst_event_ID INT,
    mstevent_event_name VARCHAR(255),
    title VARCHAR(255) NOT NULL,
    description TEXT,
    speaker VARCHAR(255),
    onlinelink VARCHAR(255),
    dateofevent DATETIME,
    capacity INT,
    eventtype VARCHAR(50),
    createdon DATETIME DEFAULT CURRENT_TIMESTAMP,
    updatedon DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (mst_event_ID) REFERENCES tbl_events_master(ID)
);

CREATE TABLE tbl_user_event (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    user_basic_ID INT,
    events_ID INT,
    createdon DATETIME DEFAULT CURRENT_TIMESTAMP,
    updatedon DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_basic_ID) REFERENCES tbl_user_basic(ID),
    FOREIGN KEY (events_ID) REFERENCES tbl_events(ID)
);

INSERT INTO tbl_events_master (ID, event_shortname, event_name, event_default_day)
VALUES
(1, '1', 'Innovation Sunday', 'Sunday'),
(2, '2', 'Funday Sunday', 'Sunday'),
(3, '3', 'Monney Monday', 'Monday'),
(4, '4', 'Motivational Monday', 'Monday'),
(5, '5', 'Teachers Tuesday', 'Tuesday'),
(6, '6', 'Travels Tuesday', 'Tuesday'),
(7, '7', 'Women''s Wednesday', 'Wednesday'),
(8, '8', 'Wonderful wednesday', 'Wednesday'),
(9, '9', 'Teaming Thursday', 'Thursday'),
(10, '10', 'Thursty Thursday', 'Thursday'),
(11, '11', 'Throwback Thursday', 'Thursday'),
(12, '12', 'FinTech Friday', 'Friday'),
(13, '13', 'Farming Friday', 'Friday'),
(14, '14', 'Foddie Friday', 'Friday'),
(15, '15', 'Fashion Friday', 'Friday'),
(16, '16', 'Startup Saturday', 'Saturday');

INSERT INTO tbl_events (mst_event_ID, mstevent_event_name, title, description, speaker, onlinelink, dateofevent, capacity, eventtype) 
VALUES 
(1, 'Innovation Sunday', 'Innovation Sunday', 'Description for Innovation Sunday', 'Speaker Name', 'https://example.com', '2023-03-19', '100', 'Conference'),
(2, 'Funday Sunday', 'Funday Sunday', 'Description for Funday Sunday', 'Speaker Name', 'https://example.com', '2023-03-19', '100', 'Social'),
(3, 'Monney Monday', 'Monney Monday', 'Description for Monney Monday', 'Speaker Name', 'https://example.com', '2023-03-20', '100', 'Financial'),
(4, 'Motivational Monday', 'Motivational Monday', 'Description for Motivational Monday', 'Speaker Name', 'https://example.com', '2023-03-20', '100', 'Motivational'),
(5, 'Teachers Tuesday', 'Teachers Tuesday', 'Description for Teachers Tuesday', 'Speaker Name', 'https://example.com', '2023-03-21', '100', 'Education'),
(6, 'Travels Tuesday', 'Travels Tuesday', 'Description for Travels Tuesday', 'Speaker Name', 'https://example.com', '2023-03-21', '100', 'Travel'),
(7, 'Womens Wednesday', 'Womens Wednesday', 'Description for Womens Wednesday', 'Speaker Name', 'https://example.com', '2023-03-22', '100', 'Women Empowerment'),
(8, 'Wonderful Wednesday', 'Wonderful Wednesday', 'Description for Wonderful Wednesday', 'Speaker Name', 'https://example.com', '2023-03-22', '100', 'Social'),
(9, 'Teaming Thursday', 'Teaming Thursday', 'Description for Teaming Thursday', 'Speaker Name', 'https://example.com', '2023-03-23', '100', 'Team Building'),
(10, 'Thursty Thursday', 'Thursty Thursday', 'Description for Thursty Thursday', 'Speaker Name', 'https://example.com', '2023-03-23', '100', 'Social'),
(11, 'Throwback Thursday', 'Throwback Thursday', 'Description for Throwback Thursday', 'Speaker Name', 'https://example.com', '2023-03-23', '100', 'Nostalgia'),
(12, 'FinTech Friday', 'FinTech Friday', 'Description for FinTech Friday', 'Speaker Name', 'https://example.com', '2023-03-24', '100', 'Financial'),
(13, 'Farming Friday', 'Farming Friday', 'Description for Farming Friday', 'Speaker Name', 'https://example.com', '2023-03-24', '100', 'Agriculture'),
(14, 'Foddie Friday', 'Foddie Friday', 'Description for Foddie Friday', 'Speaker Name', 'https://example.com', '2023-03-24', '100', 'Food'),
(15, 'Fashion Friday', 'Fashion Friday', 'Description for Fashion Friday', 'Speaker Name', 'https://example.com', '2023-03-24', '100', 'Fashion'),
(16, 'Startup Saturday', 'Startup Saturday', 'Description for Startup Saturday', 'Speaker Name', 'https://example.com', '2023-03-25', '100', 'Startup');

CREATE TABLE tbl_email_log (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    events_ID INT,
    user_basic_ID INT,
    recipient_email VARCHAR(255),
    mail_subject VARCHAR(255),
    sent_status VARCHAR(50),
    sent_datetime DATETIME,
    sender_email VARCHAR(255),
    error_message TEXT,
    createdon DATETIME DEFAULT CURRENT_TIMESTAMP,
    createdby INT,
    updatedon DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    updatedby INT,
    FOREIGN KEY (events_ID) REFERENCES tbl_events(ID),
    FOREIGN KEY (user_basic_ID) REFERENCES tbl_user_basic(ID)
);

CREATE TABLE tbl_sms_log (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    events_ID INT,
    user_basic_ID INT,
    user_phone_number VARCHAR(20),
    smsbody TEXT,
    createdon DATETIME DEFAULT CURRENT_TIMESTAMP,
    createdby INT,
    updatedon DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    updatedby INT,
    FOREIGN KEY (events_ID) REFERENCES tbl_events(ID),
    FOREIGN KEY (user_basic_ID) REFERENCES tbl_user_basic(ID)
);

CREATE TABLE tbl_admin (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL,
    email_id VARCHAR(255) NOT NULL UNIQUE,
    country_code VARCHAR(5),
    phone_number VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    createdon DATETIME DEFAULT CURRENT_TIMESTAMP,
    createdby INT,
    updatedon DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    updatedby INT
);


