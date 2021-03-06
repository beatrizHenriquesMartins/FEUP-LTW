<?php

include_once('connection.php');

/** Gets the user with username
 * @param $username username to be search
 * @return array results of the search
 */
function getUser($username){
    global $db;

    $stmt = $db->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->execute(array($username));
    $result = $stmt->fetchAll();

    return $result;
}

/** Puts the newe user on the database
 * @param $username
 * @param $password
 * @param $name
 * @param $email
 * @param $gender
 */
function putUser($username,$password,$name,$email,$gender, $city){
    global $db;

    $stmt = $db->prepare("INSERT INTO user VALUES(?,?,?,?,?,?)");
    $stmt->execute(array($username,$password,$name,$email,$gender, $city));
}

/** Gets the restaurants names
 * @return array
 */
function getRestaurantsNames(){
  global $db;

  $stmt = $db->prepare("SELECT id,name FROM restaurant");
  $stmt->execute();
  $result = $stmt->fetchAll();

  return $result;

}

/** Gets the restaurant types
 * @return array
 */
function getRestaurantsTypes(){
    global $db;

    $stmt = $db->prepare("SELECT id,type FROM restaurant");
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result;

}

/** Gets the given restaurant row
 * @param $restaurant
 */
function getRestaurant($id){
    global $db;

    $stmt = $db->prepare("SELECT * FROM restaurant WHERE id ==?");
    $stmt->execute(array($id));
    $result = $stmt->fetchAll();

    return $result;

}

/** Gets the reviews of a restaurant
 * @param $id_restaurant id of the restaurant to search on reviews
 * @return array reviews of the given restaurant
 */
function getRestaurantReviews($id_restaurant){
    global $db;

    $stmt = $db->prepare("SELECT * FROM review WHERE id_restaurant == ?");
    $stmt->execute(array($id_restaurant));
    $result = $stmt->fetchAll();

    return $result;

}

/** Add a review to the review table
 * @param $id_restaurant
 * @param $id_user
 * @param $text
 * @param $grade
 * @param $date
 */
function putReview($id_restaurant,$id_user, $text, $grade, $date){
    global $db;

    $stmt = $db->prepare("INSERT INTO review VALUES(NULL,?,?,?,?,?)");
    $stmt->execute(array($id_restaurant,$id_user,$text,$grade,$date));
}

/** Add a restaurant to the restaurant table
 * @param $name
 * @param $location
 * @param $type
 */
function putRestaurant($name,$location,$type,$phone,$price){
    global $db;

    $stmt = $db->prepare("INSERT INTO restaurant VALUES(NULL,?,?,?,?,?)");
    $stmt->execute(array($name,$location,$type,$phone,$price));
}

/** Gets a restaurant by name
 * @param $name
 * @return array
 */
function getRestaurantByName($name){
    global $db;

    $stmt = $db->prepare("SELECT * FROM restaurant WHERE name == ?");
    $stmt->execute(array($name));
    $result = $stmt->fetchAll();

    return $result;
}

/** Adds a owner to a restaurant
 * @param $id_restaurant
 * @param $id_user
 */
function addOwner($id_restaurant,$id_user){
    global $db;

    $stmt = $db->prepare("INSERT INTO owner VALUES(?,?)");
    $stmt->execute(array($id_restaurant,$id_user));
}

/** Gets the owner/owners of a given restaurant
 * @param $id_restaurant
 * @return array
 */
function getOwners($id_restaurant){
    global $db;

    $stmt = $db->prepare("SELECT username FROM owner WHERE id_restaurant == ?");
    $stmt->execute(array($id_restaurant));
    $result = $stmt->fetchAll();

    return $result;
}

/** Updates the restaurante name
 * @param $id_restaurant
 * @param $new_name
 * @return bool
 */
function updateRestaurantName($id_restaurant,$new_name){
    global $db;

    $stmt = $db->prepare("UPDATE restaurant SET name=? WHERE id=?");
    return $stmt->execute(array($new_name,$id_restaurant));


}

/** Updates the restaurante type
 * @param $id_restaurant
 * @param $new_type
 * @return bool
 */
function updateRestaurantType($id_restaurant,$new_type){
    global $db;

    $stmt = $db->prepare("UPDATE restaurant SET type=? WHERE id=?");
    return $stmt->execute(array($new_type,$id_restaurant));
}

/** Updates the restaurant phone
 * @param $id_restaurant
 * @param $new_phone
 * @return bool
 */
function updateRestaurantPhone($id_restaurant,$new_phone){
    global $db;

    $stmt = $db->prepare("UPDATE restaurant SET phone_number=? WHERE id=?");
    return $stmt->execute(array($new_phone,$id_restaurant));
}

/** Updates the restaurant price
 * @param $id_restaurant
 * @param $new_price
 * @return bool
 */
function updateRestaurantPrice($id_restaurant,$new_price){
    global $db;

    $stmt = $db->prepare("UPDATE restaurant SET price=? WHERE id=?");
    return $stmt->execute(array($new_price,$id_restaurant));
}


/** Updates the restaurante location
 * @param $id_restaurant
 * @param $new_location
 * @return bool
 */
function updateRestaurantLocation($id_restaurant,$new_location){
    global $db;

    $stmt = $db->prepare("UPDATE restaurant SET location=? WHERE id=?");
    return $stmt->execute(array($new_location,$id_restaurant));
}

/** Get replies of a given review
 * @param $id_review
 * @return array
 */
function getReplies($id_review){
    global $db;

    $stmt = $db->prepare("SELECT * FROM reply WHERE id_review == ?");
    $stmt->execute(array($id_review));
    $result = $stmt->fetchAll();

    return $result;
}

/** Gets the id of all the user restaurants
 * @param $id_user
 * @return array
 */
function getUserRestaurants($id_user){
    global $db;

    $stmt = $db->prepare("SELECT id_restaurant FROM owner WHERE username == ?");
    $stmt->execute(array($id_user));
    $result = $stmt->fetchAll();

    return $result;
}

/** Updates user email
 * @param $id_user
 * @param $new_email
 * @return bool
 */
function updateUserEmail($id_user,$new_email){
    global $db;

    $stmt = $db->prepare("UPDATE user SET email=? WHERE username=?");
    return $stmt->execute(array($new_email,$id_user));
}

/** Updates user full name
 * @param $id_user
 * @param $new_full_name
 * @return bool
 */
function updateUserFullName($id_user,$new_full_name){
    global $db;

    $stmt = $db->prepare("UPDATE user SET name=? WHERE username=?");
    return $stmt->execute(array($new_full_name,$id_user));
}

/** Updates user gender
 * @param $id_user
 * @param $new_gender
 * @return bool
 */
function updateUserGender($id_user,$new_gender){
    global $db;

    $stmt = $db->prepare("UPDATE user SET gender=? WHERE username=?");
    return $stmt->execute(array($new_gender,$id_user));
}

/** Adds the replys to the database
 * @param $id_review
 * @param $id_user
 * @param $text_reply
 */
function addReply($id_review,$id_user,$text_reply,$date){
    global $db;

    $stmt = $db->prepare("INSERT INTO reply VALUES(NULL,?,?,?,?)");
    $stmt->execute(array($id_review,$id_user,$text_reply,$date));
}

function deleteRestaurant($id_restaurant){
    global $db;

    $stmt = $db->prepare("DELETE FROM restaurant WHERE id=?");
    $stmt->execute(array($id_restaurant));

    $stmt = $db->prepare("DELETE FROM owner WHERE id_restaurant=?");
    $stmt->execute(array($id_restaurant));

    $reviews = getRestaurantReviews($id_restaurant);

    foreach ($reviews as $review){
        $stmt = $db->prepare("DELETE FROM reply WHERE id_review=?");
        $stmt->execute(array($review['id']));
    }

    $stmt = $db->prepare("DELETE FROM review WHERE id_restaurant=?");
    $stmt->execute(array($id_restaurant));

}

function deleteReview($id_review){
    global $db;

    $replies = getReplies($id_review);
    foreach ($replies as $reply){
        $stmt = $db->prepare("DELETE FROM reply WHERE id_review=?");
        $stmt->execute(array($id_review));
    }

    $stmt = $db->prepare("DELETE FROM review WHERE id=?");
    $stmt->execute(array($id_review));
}

function deleteReply($id_reply){
    global $db;

    $stmt = $db->prepare("DELETE FROM reply WHERE id=?");
    $stmt->execute(array($id_reply));
}

/** Creates user image
 * @param $id_user
 * @param $path
 * @return bool
 */
function createUserImage($id_user,$path){
    global $db;

    $stmt = $db->prepare("INSERT INTO userImages VALUES (NULL, ?, ?)");
    return $stmt->execute(array($id_user, $path));
}

/** Gets the user image
 * @param $id_user
 * @return bool
 */
function getUserImage($id_user){
    global $db;

    $stmt = $db->prepare("SELECT path FROM userImages WHERE img_username = ?");
    $stmt->execute(array($id_user));
    $result = $stmt->fetchAll();

    return $result;
}

/** Updates the user image
 * @param $id_user
 * @return bool
 */
function updateUserImage($id_user, $path){
    global $db;

    $stmt = $db->prepare("UPDATE userImages SET path = ? WHERE img_username = ?");
    return $stmt->execute(array($path, $id_user));

}

/** Gets names that look alike param name
 * @param $name
 * @return array
 */
function getRestaurantByName2($name){
    global $db;

    $expression = '%'.$name.'%';

    $stmt = $db->prepare("SELECT * FROM restaurant WHERE name LIKE ?");
    $stmt->execute(array($expression));
    $result = $stmt->fetchAll();

    return $result;
}

/** Gets location that look alike param location
 * @param $location
 * @return array
 */
function getRestaurantByLocation($location){
    global $db;

    $expression = '%'.$location.'%';

    $stmt = $db->prepare("SELECT * FROM restaurant WHERE location LIKE ?");
    $stmt->execute(array($expression));
    $result = $stmt->fetchAll();

    return $result;
}

/** Getting all restaurants with a price smallar than param price
 * @param $price
 * @return array
 */
function getRestaurantByMaxPrice($price){
    global $db;

    $stmt = $db->prepare("SELECT * FROM restaurant WHERE price <= ?");
    $stmt->execute(array($price));
    $result = $stmt->fetchAll();

    return $result;
}

/** Gets the restaurants of a given type
 * @param $type
 * @return array
 */
function getRestaurantByType($type){
    global $db;

    $expression = '%'.$type.'%';

    $stmt = $db->prepare("SELECT * FROM restaurant WHERE type LIKE ?");
    $stmt->execute(array($expression));
    $result = $stmt->fetchAll();

    return $result;
}

/** Gets the number of reviews of an user
 * @param $type
 * @return array
 */
function getNumberOfRevies($id_user){
    global $db;

    $stmt = $db->prepare("SELECT COUNT(*) FROM review WHERE id_user = ?");
    $stmt->execute(array($id_user));
    $result = $stmt->fetchAll();

    return $result[0];
}



/** Updates restaurants images
 * @param $id_restaurant
 * @param $path
 * @return bool
 *
 */
function updateRestaurantImage($id_restaurant, $path){
    global $db;

    $stmt = $db->prepare("UPDATE restaurantImages SET path = ? WHERE id_restaurant= ?");
    return $stmt->execute(array($path, $id_restaurant));

}

/** Gets restaurant images
 * @param $id_restaurant
 * @return array
 */
function getRestaurantImages($id_restaurant){
    global $db;

    $stmt = $db->prepare("SELECT * FROM restaurantImages WHERE id_restaurant=?");
    $stmt->execute(array($id_restaurant));
    $result = $stmt->fetchAll();

    return $result;
}

function createRestaurantImage($id_restaurant,$path){
    global $db;

    $stmt = $db->prepare("INSERT INTO restaurantImages VALUES (NULL, ?, ?)");
    return $stmt->execute(array($id_restaurant, $path));
}
