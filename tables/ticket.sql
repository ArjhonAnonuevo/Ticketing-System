CREATE TABLE tickets(
    ticket_id INT NOT NULL PRIMARY KEY,
    subject VARCHAR(50),
    support_type VARCHAR(20) NOT NULL,
    category VARCHAR(25),
    description TEXT NOT NULL,
    attachments VARCHAR(255),
    requestor_id INT,
    FOREIGN KEY (requestor_id) REFERENCES user(id) 
)