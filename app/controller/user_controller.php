<?php
	$view = SERVER_ROOT."\\app\\view\\$controller\\$action.php";
	$indexUrl = APP_ROOT."/index.php?{controller}_index";
	require_once SERVER_ROOT."\\core\\account_service.php";
	require_once SERVER_ROOT."\\core\\user_service.php";
	session_start();
?>
<?php
	if (!isset($_SESSION['loggedUser'])) {
		header("location: ".APP_ROOT);
	}
	$request = numOfFriendReq($_SESSION['loggedUser']['uid']);
	$unseen = getUnseenMessage($_SESSION['loggedUser']['uid']);
	switch ($action) {
      	case 'dashboard':
			$suggestUserList = getSuggestedUsers($_SESSION['loggedUser']);
			$genderList = getAllGender();
			$religionList = getAllReligion();
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$suggestUserList = getSearchedUsers($_SESSION['loggedUser'],$_POST);
			}else{
				$preSearchedList = getPreviousSearched($_SESSION['loggedUser']);
			}
			break;
		case 'full-profile':		
			break;
		case 'public-profile':
			$errorMsg = '';
			if (count($_GET)>0) {
				$key = array_keys($_GET)[1];
				$searchedUser=getUserDetailsById($key);
				$perAddress =
				$messages = getAllMessageById($_SESSION['loggedUser']['uid'], $key);
				$isFavorite = isFavoriteUser($_SESSION['loggedUser']['uid'],$key);
				$isReqSent = isFriendReqSent($_SESSION['loggedUser']['uid'],$key);
				$wantFriend = isFriendReqSent($key, $_SESSION['loggedUser']['uid']);
				$isFriend = isFriend($_SESSION['loggedUser']['uid'],$key);
				if ($_SERVER['REQUEST_METHOD']=="POST") {
					if (isset($_POST['send'])) {
						$message['sender'] = $_SESSION['loggedUser']['uid'];
						$message['send_to'] = $key;
						$message['time'] = date('Y-m-d h:m:s');
						$message['message'] = $_POST['message'];
						if (sendMessage($message)==1) {
							header("location: ".APP_ROOT."/?user_public-profile&".$key);
						}
					}
					if (isset($_POST['addFavorite'])) {
						$errorMsg = addToFavorite($_SESSION['loggedUser']['uid'],$key);
					}else if (isset($_POST['removeFavorite'])) {
						$errorMsg = removeFromFavorite($_SESSION['loggedUser']['uid'],$key);
					}else if (isset($_POST['addFriend'])) {
						$errorMsg = sendFriendReq($_SESSION['loggedUser']['uid'],$key);
					}else if (isset($_POST['accept'])) {
						$errorMsg = acceptFriendRequest($_SESSION['loggedUser']['uid'], $_POST['friendId']);
					}else if (isset($_POST['reject'])) {
						$errorMsg = rejectFriendRequest($_SESSION['loggedUser']['uid'], $_POST['friendId']);
					}else if (isset($_POST['cancelReq'])) {
						$errorMsg = cancelFriendReq($_SESSION['loggedUser']['uid'],$key);
					}else if (isset($_POST['unFriend'])) {
						$errorMsg = unFriend($_SESSION['loggedUser']['uid'],$key);
					}
					header("location: ".APP_ROOT."/?user_public-profile&".$key);
				}
			}
			break;
		case 'favorite':
			$errorMsg = '';
			$genderList = getAllGender();
			$religionList = getAllReligion();
			$favoriteList = getAllFavoriteUsersById($_SESSION['loggedUser']['uid']);
			if (!isset($favoriteList)) {
				$errorMsg = "You don't have any favorite user.";
			}
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$errorMsg = removeFromFavorite($_SESSION['loggedUser']['uid'], $_POST['friendId']);
				header("location: ".APP_ROOT."/?user_favorite");
			}
			break;
		case 'sent-request':
			$errorMsg = '';
			$genderList = getAllGender();
			$religionList = getAllReligion();
			$friendReqList = getAllFriendReqSentById($_SESSION['loggedUser']['uid']);
			if (!isset($friendReqList)) {
				$errorMsg = "You didn't send any request.";
			}
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$errorMsg = cancelFriendReq($_SESSION['loggedUser']['uid'], $_POST['friendId']);
				header("location: ".APP_ROOT."/?user_sent-request");
			}
			break;
		case 'friend-request':
			$errorMsg = '';
			$genderList = getAllGender();
			$religionList = getAllReligion();
			$friendReqList = getAllFriendReqById($_SESSION['loggedUser']['uid']);
			if (!isset($friendReqList)) {
				$errorMsg = "You haven't any request.";
			}
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				if (isset($_POST['accept'])) {
					$errorMsg = acceptFriendRequest($_SESSION['loggedUser']['uid'], $_POST['friendId']);
				}else if (isset($_POST['reject'])) {
					$errorMsg = rejectFriendRequest($_SESSION['loggedUser']['uid'], $_POST['friendId']);
				}
				header("location: ".APP_ROOT."/?user_friend-request");
			}
			break;
		case 'friend-list':
			$errorMsg = '';
			$genderList = getAllGender();
			$religionList = getAllReligion();
			$friendList = getAllFriendById($_SESSION['loggedUser']['uid']);
			if (!isset($friendList)) {
				$errorMsg = "You don't have any friend.";
			}
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				$errorMsg = unFriend($_SESSION['loggedUser']['uid'], $_POST['friendId']);
				header("location: ".APP_ROOT."/?user_friend-list");
			}
			break;
			break;
		case 'interested':
			$errorMsg = '';
			$genderList = getAllGender();
			$religionList = getAllReligion();
			$favoriteList = getAllInterestedUsersById($_SESSION['loggedUser']['uid']);
			if (!isset($favoriteList)) {
				$errorMsg = "You have not any follower.";
			}
			break;
		case 'life-style':
			$errorMsg = '';
			$hobbyList = getAllHobbies();
			$interestList = getAllInterests();
			$sportList = getAllSports();
			$musicList = getAllMusics();
			$_SESSION['loggedUser']['interests']= getInterestsByUid($_SESSION['loggedUser']['uid']);
			$_SESSION['loggedUser']['hobbies']= getHobbiesByUid($_SESSION['loggedUser']['uid']);
			$_SESSION['loggedUser']['musics']= getMusicsByUid($_SESSION['loggedUser']['uid']);
			$_SESSION['loggedUser']['sports']= getSportsByUid($_SESSION['loggedUser']['uid']);
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				if (isset($_POST['hobbyList'])) {
					$user['hobbies'] = $_POST['hobbyList'];
					$errorMsg = updateUserHobbiesById($_SESSION['loggedUser']['uid'],$user);
				}
				if (isset($_POST['interestList'])) {
					$user['interests'] = $_POST['interestList'];
					$errorMsg = updateUserInterestsById($_SESSION['loggedUser']['uid'],$user);
				}
				if (isset($_POST['musicList'])) {
					$user['musics'] = $_POST['musicList'];
					$errorMsg = updateUserMusicsById($_SESSION['loggedUser']['uid'],$user);
				}
				if (isset($_POST['sportList'])) {
					$user['sports'] = $_POST['sportList'];
					$errorMsg = updateUserSportsById($_SESSION['loggedUser']['uid'],$user);
				}
			}
				break;
		default:
			//header("location: ".APP_ROOT."/?user_dashboard");
			break;
	}
	require_once $view;
?>
