# Github top users application

## Description of the app
Create a React application that will show the top 10 users with over 1000 followers on Github. Leverage Github API to fetch the user list. The application should leverage any component library to show a user list with avatars, amount of followers and username of the people.
The application should not expose github API token to the frontend application code. 

## Technical requirements
UI - React
Framework - Laravel + Docker

## Acceptance criteria
1) Application will show the top 10 users with over 1000 followers on the Github on the initial UI load.
2) Application will show a filterable input to search for users with over 1000 followers by username on Github.
3) Application will be able to show the github user followers chart over the last 24 hours in 1 hour period by clicking on a chart icon.
4) Username search will be performed as the user is typing the username (live search)
5) Github API token is not exposed to the FE code. 
6) Clicking on the username/avatar will open their profile on Github website. 

## Bonus points (Stretch goals)
2) Ability to mark any profile as favorite/unfavorite 
3) Favorite list stored under the user e-mail (authorization will be just by entering e-mail, no passwords/auth just raw e-mail)
