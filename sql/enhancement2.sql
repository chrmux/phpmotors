
-- Insert the following new client to the clients table 

INSERT INTO `clients`(`clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES ('Tony','Stark','tony@starkent.com','Iam1ronM@n', '1','I am the real Ironman');-- Modify the Tony Stark record to change the clientLevel to 3

UPDATE clients
SET clientLevel = '3'
WHERE clientId = '1'

-- Modify the "GM Hummer" record to read "spacious interior" rather than "small interior"

UPDATE inventory
SET invDescription = REPLACE(invDescription, 'small interior', 'spacious interior')
WHERE invMake = 'GM'

-- Use an inner join to select the invModel field from the inventory table 
-- and the classificationName field from the carclassification table for inventory items that belong to the "SUV" category.

SELECT invModel
FROM inventory
INNER JOIN carclassification
ON inventory.classificationId = carclassification.classificationId
WHERE inventory.classificationId = 1

-- Delete the Jeep Wrangler from the database. 

DELETE FROM `inventory`
WHERE invId = 1

-- Update all records in the Inventory table to add "/phpmotors" to the beginning of the file path 
-- in the invImage and invThumbnail columns using a single query.

UPDATE inventory SET invImage=concat('/phpmotors',invImage), invThumbnail=concat('/phpmotors', invThumbnail);

-- Create a video of you running all of these SQL statements 
-- and showing the result of running each SQL statement.