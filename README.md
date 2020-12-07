1. Clone repository
2. Run `composer install`
3. Setup connection to database in your `.env` file
4. Endpoints list:
* `api/v1/clients` - create a client (POST)
* `api/v1/complaints` - create a complaint (POST)
* `api/v1/complaints/client/{client_id}` - complaints list of specified client (GET)
* `api/v1/complaints/{id}` - take complaint to work (PUT)
