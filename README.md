# Machine Learning

## About Placesir
Placesir is a recommendation system application for tourist attractions in 5 cities in Indonesia (Jakarta, Bandung, Semarang, Yogyakarta, and Surabaya). Machine learning tasks in this application are to make database for each of the tourist attractions and to create a suitable recommendation system model.

## Dataset
We used a pre-existing dataset available on Kaggle, from [Getloc](https://www.kaggle.com/datasets/aprabowo/indonesia-tourism-destination) project. In the pre-existing dataset, there were 437 tourist attractions in 5 cities in Indonesia. All of these attractions were divided into 6 categories (cultural, amusement parks, nature reserves, marine, shopping centers, and worship place). In addition, there were also datasets for 300 users and 10,000 ratings for tourist attractions.

Furthermore, we added 1 more category to the dataset, culinary, which contains new 42 culinary tourism objects in the 5 cities. So that in total there are 515 tourist attraction data that we use. In addition, we created 15,000 dummy ratings for all these attractions. From the dummy user data, we also add random reviews to be displayed in the application. Our step by step in adding and editing dataset can be viewed [here](https://docs.google.com/spreadsheets/d/16tOyKW-F4e2UZMhBBxGqpur1nPEhnCXx6prVseGaEFA/edit?usp=sharing)

## Recommendation System
Recommendation system is a subclass of information filtering systems that seeks to predict or suggest relevant items to users. Recommendation system is an algorithm that is still being developed and the level of difficulty depends on how complex the desired application is. There are many types of recommendation system model.

#### Collaborative Based Filtering
Collaborative filtering is a method of making automatic predictions (filtering) about the interest of a user by collecting preferences or taste information from many users (collaborating). The underlying assumption of the collaborative filtering approach is that if a person A has the same opinion as a person B on an issue, A is more likely to have B's opinion on a different issue than that of a randomly chosen person.

#### Content Based Filtering
Content-based filtering is one popular technique of recommendation or recommender systems. The content or attributes of the things you like are referred to as "content." The goal behind content-based filtering is to classify products with specific keywords, learn what the customer likes, look up those terms in the database and then recommend similar things. This type of recommender system is hugely dependent on the inputs provided by users. For example, when a user searches for a group of keywords then the application displays all the items consisting of those keywords.

In placesir we tried to build 2 types of recommendation system; user-based collaborative filtering and content-based filtering. But in practice we only deploy the user-based collaborative filtering model due to time constraint.

## Reference
1. For content-based recommendation systems: [here](https://www.kdnuggets.com/2020/07/building-content-based-book-recommendation-engine.html) and [here](https://www.youtube.com/watch?v=1xtrIEwY_zY)
2. For user-based collaborative filtering: [here](https://gilberttanner.com/blog/building-a-book-recommendation-system-usingkeras/)
