<?php
function addReview($reviewText, $clientId){
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO reviews (reviewText, clientId)
        VALUES (:reviewText, :clientId)';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);

    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
   }

function getReviews($clientId) {
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM reviews WHERE clientId = :clientId ';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $reviewArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviewArray;
   }

// Update a review
function updateReview($reviewId, $reviewText, $reviewDate, $clientId, $invId) {
    $db = phpmotorsConnect();
    $sql = 'UPDATE reviews SET reviewId = :reviewId, reviewText = :reviewText, reviewDate = :reviewDate, clientId = :clientId WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':reviewDate', $reviewDate, PDO::PARAM_STR);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// Delete review from the review table
function deleteReview($reviewId) {
    $db = phpmotorsConnect();
    $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
   }   
?>