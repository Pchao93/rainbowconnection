# rainbowconnection

RainbowConnection is built on Laravel and Ember.js (coming soon!) To run the app in your local environment, you'll need to run NGINX/Apache for the Laravel backend (Homestead recommended!) and use the Ember CLI (ember serve) to start the frontend application.

## Known Issues
* Still learning PHP/Laravel and Ember.js
* Need to get frontend with Ember.js up and running. Ember won't recognize returned objects from Laravel backend as JSON documents.
* Creating more than 100 users in the local environment for some reason prevents connections from being made with the test endpoint.

## Tradeoffs made
* I chose to focus on backend vs frontend prior to the deadline so that there is at least an API to play with.
* User connections are almost always present in both the index and show view, so user connections are folded into the user relation rather than a separate table.
