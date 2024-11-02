CREATE TABLE userAdmin_entities (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    branchlocation VARCHAR (50),
    password VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE advertising_agent(
    advertisingAgent_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    work_space_nickname VARCHAR (50),
    gender VARCHAR (50),
    date_of_birth VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE advertising_projects(
    project_id INT AUTO_INCREMENT PRIMARY KEY,
    advertisingAgent_id INT, 
    advertising_project_name VARCHAR(50),
    kind_of_product VARCHAR(50),
    brand_name VARCHAR (50),
    target_audience VARCHAR (50),
    added_by INT,
    last_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE audit_log (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    action VARCHAR(255) NOT NULL,
    username VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES userAdmin_entities(user_id)  
        ON DELETE CASCADE
        ON UPDATE CASCADE
);
