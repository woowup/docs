#How to reward your own actions.
###Overview

It's very probably that you may want to reward your customers with points for doing an action that is not included in the original functionality of WoowUp. For example, you may want to give points for answering a survery or uploading a photo to Instagram with a specific #hashtag.
The good news is that it's very easy to do it with just a few lines of code. Let's take a look at the steps to do it.

For the purpouse of this article, let's supouse you want to reaward your customers for answering a survey.

Identify in your app the place where the Survery is marked as Answered (or any other state you want). You need to call WoowUp right there to register the transaction and give the related points to the customer. 

In this example, we are going to give 10 points for answering a Survey (but you may use another formula, for example 1 point for each question in the survery or 10 points for small surveys and 20 for large ones, or what best suit your Program).

First, remember to get your Apikey and Contest Id from the Connect tab in the administrator module of WoowUp to include it in the following code:

```
    // REPLACE WITH YOUR CONTEST ID and apiKey
    $contestId = 1085;
    $apiKey = 'fdsa5465523fdfgd245FF'; 
```

Get the email of the customer and assign it to $email in the following code to look for the customer in your Loyalty Program Database:

```
    // Replace it with your customer email
    $email = 'example@domain.com'; 
        
    $uId = WoowUpAPI::getUIdByMail($email);

    if (!empty($uId)){

        // In the following example, replace the values for the actual data from your Survey;
        $points = 10;
        $description ='Survey #1456324'; 
        WoowUpAPI::addPoints($contestId, $apiKey, $uId, $points, $description, null);
    }else{
        //User not found, not currently registered in your loyalty program
    }
```
