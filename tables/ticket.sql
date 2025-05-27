    CREATE TABLE tickets(
        ticket_id INT NOT NULL PRIMARY KEY,
        subject VARCHAR(50),
        support_type VARCHAR(20) NOT NULL,
        category VARCHAR(25),
        description TEXT NOT NULL,
        requested_date date,
        attachments VARCHAR(255),
        requestor_id VARCHAR(50),
        FOREIGN KEY (requestor_id) REFERENCES user(employee_id) 
    )
