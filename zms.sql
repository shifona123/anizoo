CREATE DATABASE zoo_management;
USE zoo_management;


CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255)NOT NULL);


CREATE TABLE animals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    cage_number VARCHAR(50) NOT NULL,
    feed_number VARCHAR(50) NOT NULL,
    breed VARCHAR(255) NOT NULL,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO animals (name, description, image, cage_number, feed_number, breed, creation_date)
VALUES 
('African Lion', 'A large, powerful carnivore found in African savannas.', 'uploads/lion.jpg', 'C-101', 'F10', 'Panthera leo', NOW()),

('Bengal Tiger', 'The largest member of the cat family, native to the Indian subcontinent.', 'uploads/tiger.jpg', 'C-102', 'F12', 'Panthera tigris tigris', NOW()),

('Asian Elephant', 'The largest land animal in Asia, known for intelligence and memory.', 'uploads/elephant.jpg', 'C-201', 'F20', 'Elephas maximus', NOW()),

('Giraffe', 'The tallest land animal, found in African savannas.', 'uploads/giraffe.jpg', 'C-301', 'F15', 'Giraffa camelopardalis', NOW()),

('Grizzly Bear', 'A large bear species found in North America, known for its strength.', 'uploads/grizzly.jpg', 'C-401', 'F18', 'Ursus arctos horribilis', NOW()),

('Great Hornbill', 'A large, colorful bird native to South and Southeast Asia.', 'uploads/hornbill.jpg', 'C-501', 'F8', 'Buceros bicornis', NOW()),

('King Cobra', 'The world\'s longest venomous snake, found in forests of India and Southeast Asia.', 'uploads/king_cobra.jpg', 'C-601', 'F5', 'Ophiophagus hannah', NOW()),

('Blue Macaw', 'A striking blue parrot known for intelligence and mimicry.', 'uploads/macaw.jpg', 'C-701', 'F7', 'Anodorhynchus hyacinthinus', NOW()),

('Cheetah', 'The fastest land animal, capable of speeds up to 75 mph.', 'uploads/cheetah.jpg', 'C-801', 'F13', 'Acinonyx jubatus', NOW()),

('Giant Panda', 'A bear species native to China, known for its love of bamboo.', 'uploads/panda.jpg', 'C-901', 'F9', 'Ailuropoda melanoleuca', NOW());

 
    CREATE TABLE dashboard_stats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    total_animals INT NOT NULL DEFAULT 0,
    total_normal_adult INT NOT NULL DEFAULT 0,
    today_normal_adult INT NOT NULL DEFAULT 0,
    today_normal_children INT NOT NULL DEFAULT 0,
    yesterday_normal_adult INT NOT NULL DEFAULT 0,
    yesterday_normal_children INT NOT NULL DEFAULT 0,
    total_foreigner_adult INT NOT NULL DEFAULT 0,
    total_foreigner_children INT NOT NULL DEFAULT 0,
    today_foreigner_adult INT NOT NULL DEFAULT 0,
    today_foreigner_children INT NOT NULL DEFAULT 0,
    yesterday_foreigner_adult INT NOT NULL DEFAULT 0,
    yesterday_foreigner_children INT NOT NULL DEFAULT 0
);

-- Insert some sample data
INSERT INTO dashboard_stats (total_animals, total_normal_adult, today_normal_adult, today_normal_children, yesterday_normal_adult, yesterday_normal_children, total_foreigner_adult, total_foreigner_children, today_foreigner_adult, today_foreigner_children, yesterday_foreigner_adult, yesterday_foreigner_children)
VALUES (8, 6, 0, 0, 0, 0, 6, 3, 0, 0, 0, 0);

CREATE TABLE ticket_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ticket_type VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);
INSERT INTO ticket_types (ticket_type, price) VALUES
('Normal Adult', 300),
('Normal Child', 80),
('Foreigner Adult', 1100),
('Foreigner Child', 800);

CREATE TABLE normal_tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ticket_id VARCHAR(20) UNIQUE NOT NULL,  -- Unique Ticket ID
    visitor_name VARCHAR(255) NOT NULL,
    adult_count INT NOT NULL,
    child_count INT NOT NULL,
    visit_date DATE NOT NULL,  -- Visit Date
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO normal_tickets (ticket_id, visitor_name, adult_count, child_count, visit_date) 
VALUES 
('NT-001', 'Christo', 2, 1, '2025-03-25'),
('NT-002', 'Aruna', 1, 0, '2025-03-26'),
('NT-003', 'Rayon', 3, 2, '2025-03-27'),
('NT-004', 'Jeppi', 2, 2, '2025-03-28'),
('NT-005', 'Manoj', 0, 1, '2025-03-29');

CREATE TABLE foreigner_tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ticket_id VARCHAR(20) UNIQUE NOT NULL,  -- Unique Ticket ID
    visitor_name VARCHAR(255) NOT NULL,
    adult_count INT NOT NULL,
    child_count INT NOT NULL,
    visit_date DATE NOT NULL,  -- Visit Date
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO foreigners_tickets (ticket_id, visitor_name, adult_count, child_count, visit_date) 
VALUES 
('NT-006', 'George',5, 1, '2025-03-25'),
('NT-007', 'Joviya', 4, 0, '2025-03-26'),
('NT-008', 'Benish',2, 2, '2025-03-27'),
('NT-009', 'Anu', 2, 1, '2025-03-28'),
('NT-010', 'Shiji', 1, 1, '2025-03-29');

CREATE TABLE normal_people_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    from_date DATE NOT NULL,
    to_date DATE NOT NULL,
    report_generated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE foreigner_tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ticket_id VARCHAR(50) NOT NULL,
    visitor_name VARCHAR(100) NOT NULL,
    visit_date DATE NOT NULL
);



CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
INSERT INTO admins (username, password) 
VALUES ('admin', MD5('yourpassword'));

