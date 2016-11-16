# Laravel PHP Framework

## Scenario

ACME’s technical infrastructure includes an API Gateway.  The gateway offers a number of recipe operations.  Recipes contain a lot of information such as cuisine, customer ratings & comments, stock levels and diet types.
Your task is to design, develop and deliver to us your version of a set of recipe operations.  Your solution should meet our functional and nonfunctional requirements below.
### Functional Requirements

Your API must offer the following operations:
* Fetch a recipe by id
* Fetch all recipes for a specific cuisine (should paginate)
* Rate an existing recipe between 1 and 5
* Update an existing recipe
* Store a new recipe

Don’t include any client code e.g. HTML
The service should provide a set of RESTful JSON based routes

### Non-functional Requirements
* The service must be built using a modern web application framework
* The code should be ‘production ready’
* The service should use the accompanying data contained in the Google Doc link (please download as a CSV) as the primary data source, which can be loaded into memory (please don’t use a database).  Feel free to generate additional test data based on the same scheme if it helps.