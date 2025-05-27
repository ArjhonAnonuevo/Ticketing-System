CREATE TABLE ticket_status (
    status_id INT AUTO_INCREMENT PRIMARY KEY,
    status_name VARCHAR(50) NOT NULL UNIQUE,
    last_modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    ticket_id INT,
    FOREIGN KEY (ticket_id) REFERENCES tickets(ticket_id)
);
