#Examples

##Register a new user

First, what you have to check is that the user does not already exist. For that purpose, you have to call the **/is_user** request.

For example, if in your app you have an user with the identificator = 0014823, you should do:

```shell
curl -H 'Username: 98765' \
  -H 'Apikey: .....' \
  -H 'Content-Type: application/json' \
  https://admin.woowup.com/apiv2/98765/is_user?service=1&service_uid=0014823
```

| Parameter   | Description               |
| ----------- | ------------------------- |
| service_uid | Identificator in your app |

It will return a JSON object, with 2 fields: **status** and **message**

```json
{
  "status":true,
  "message":"User already exists"
}
```

**status = true** means the user __already exists__
**status = false** means the user __does not exist__


Then, in case you got the user does not exist, you have to do a POST request to register that new user

```shell
curl -H 'Username: 98765' \
  -H 'Apikey: .....' \
  -H 'Accept: application/json' \
  -d 'uid=0014823&pass=1234&email=johndoe@gmail.com&first_name=john&last_name=doe' \
  https://admin.woowup.com/apiv2/98765/register_user_classic
```

The POST method to use is **/register_user_classic**

| Parameter | Description               |
| --------- | ------------------------- |
| uid       | Identificator in your app |
| pass      | Password (*)              |
| email     | User's Email              |
| first_name| User's First name         |
| last_name | User's Last name          |

(*) It is required for you to set one field as _password_ in your Custom Form

It returns a JSON object with 2 fields: **status**, **data**

**status** means if the user could be registered **successfully**
**data** is the user object as it was created in WoowUp

```json
{
  "status":true,
  "data":{
    "user":{
      "service":1,
      "status":1,
      "service_uid":"0014823",
      "service_pass":"81dc9bdb52d04dc20036dbd8313ed055", //encoded password
      "email":"johndoe@gmail.com",
      "first_name":"John",
      "last_name":"Doe",
      "name":"John Doe",
      "createtime":"2015-05-14 11:33:12",
      "id":"99339",
      "locale":null,
      "timezone":null,
      "fid":null,
      "useremail":null,
      "gender":null,
      "birthday":null,
      "hometown":null,
      "location":null,
      "country_id":null
    }
  }
}
```

##Getting user information

If you want to have more information about your user before adding him points, you can use the GET request **/user_by_uid** or **/user_by_email**

```shell
curl -H 'Username: 98765' \
  -H 'Apikey: .....' \
  -H 'Content-Type: application/json' \
  https://admin.woowup.com/apiv2/98765/user_by_uid?uid=0014823
```

| Parameter   | Description               |
| ----------- | ------------------------- |
| uid         | Identificator in your app |

Or:

```shell
curl -H 'Username: 98765' \
  -H 'Apikey: .....' \
  -H 'Content-Type: application/json' \
  https://admin.woowup.com/apiv2/98765/user_by_email?email=johndoe@gmail.com
```

| Parameter   | Description               |
| ----------- | ------------------------- |
| email       | User's Email              |

The response might be something like this

```json
{
  "status":true,
  "data":{
    "user":{
      "points":"4250",
      "name":"John Doe",
      "first_name":"John",
      "last_name":"Doe",
      "email":"johndoe@gmail.com",
      "locale":"en_GB",
      "timezone":"-3",
      "createtime":"2013-10-22 20:15:17",
      "fid":"1413631099",
      "service":null,
      "service_uid":null,
      "service_pass":null,
      "status":"1",
      "gender":"1",
      "birthday":"1981-11-21",
      "hometown":"Buenos Aires, Argentina",
      "location":"Buenos Aires, Argentina",
      "country_id":"13",
      "userapp_id":"13247",
      "app_id":"98765"
    }
  }
}
```


##Add points

You can add points to a user by having his **userapp_id** (WoowUp ID), **service_uid** (Your app's user identificator) or **email**

###By Userapp ID

You have to do a POST request:

```shell
curl -H 'Username: 98765' \
  -H 'Apikey: .....' \
  -H 'Accept: application/json' \
  -d 'userapp_id=13247&points=120&concept="Donating"' \
  https://admin.woowup.com/apiv2/98765/add_points
```

The POST method to use is **/add_points**

|  Parameter | Required | Description  |
| ---------- | -------- | ------------ |
| userapp_id | Yes      | WoowUp User's ID |
| points     | Yes      | Points to add |
| concept    | No       | Brief description of the transaction |
| branch     | No       | Branch name (It must be already registered in WoowUp) |

It returns a JSON object with 2 fields: **status**, **data**

**status** means if the transaction could be done **successfully**
**data** contains the transaction id if it was successfull

```json
{
  "status":true,
  "data":{
    "transaction_id":"2424"
  }
}
```

###By UID

When adding points by uid or email, you have more options to use.

It is also via POST request:

```shell
curl -H 'Username: 98765' \
  -H 'Apikey: .....' \
  -H 'Accept: application/json' \
  -d 'userapp_id=13247&points=120&concept="Donating"' \
  https://admin.woowup.com/apiv2/98765/add_points_by_uid
```

|  Parameter | Required | Description  |
| ---------- | -------- | ------------ |
| app_id     | Yes      | WoowUp App's ID |
| userapp_id | Yes      | WoowUp User's ID |
| points     | Yes      | Points to add |
| concept    | No       | Concept ID (**) |
| description| No       | Brief descirption of the transaction |
| price      | No       | Purchase price. Only valid for purchase order |
| branch     | No       | Branch name (It must be already registered in WoowUp) |

(**) Concepts ids avaliable:

|  id | Concept  |
| --- | -------- |
| 3   | Manual assignment |
| 4   | Registration |
| 5   | Referral |
| 10  | Survey |
| 11  | Purchase order |

