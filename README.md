# Games API

**Partners:** Luis Escalona and Harry Sarraga

**Section:** IT1E

**Resource:** Game (title, category, rating, release_date)

A Laravel REST API for games, protected with Laravel Sanctum token authentication.

## Setup

1. Clone the project:
   `git clone <repo-url>`
2. Go into the folder:
   `cd cit3102-m5-game-harry-branch`
3. Install packages:
   `composer install`
4. Copy the environment file:
   `copy .env.example .env` (Mac/Linux: `cp .env.example .env`)
5. Generate the app key:
   `php artisan key:generate`
6. Create the SQLite database file:
   `New-Item database\database.sqlite` (Mac/Linux: `touch database/database.sqlite`)
7. Check that `.env` has `DB_CONNECTION=sqlite`
8. Run the migrations:
   `php artisan migrate`
9. Start the server:
   `php artisan serve`

The API runs at `http://127.0.0.1:8000/api`. Send the header `Accept: application/json` with every request.

## Routes

| Verb   | Path             | What it does                            | Token needed? |
|--------|------------------|---------------------------------------- |---------------|
| POST   | /api/register    | Create a new user and return a token    | No            |
| POST   | /api/login       | Log in and return a token               | No            |
| POST   | /api/logout      | Delete the current token                | Yes           |
| GET    | /api/me          | Show the logged-in user                 | Yes           |
| GET    | /api/games       | List games (filter by category, rating) | Yes           |
| POST   | /api/games       | Create a game                           | Yes           |
| GET    | /api/games/{id}  | Show one game                           | Yes           |
| PUT    | /api/games/{id}  | Update a game                           | Yes           |
| DELETE | /api/games/{id}  | Delete a game                           | Yes           |




## SCREENSHOTS FOR STEP 6
1 <img width="1606" height="457" alt="image" src="https://github.com/user-attachments/assets/f6427a2b-50a2-4173-b6e1-fc5397a4475b" />


2<img width="1599" height="510" alt="image" src="https://github.com/user-attachments/assets/fc77aa76-10b3-4054-b5df-78a6c902e868" />


3 Get - Games No Token.png
![Get Games No Token](ReadME%20screenshots/Get%20-%20Games%20No%20Token.png)

4 Get - Games With Token.png
![Get Games With Token](ReadME%20screenshots/Get%20-%20Games%20With%20Token.png)

5<img width="1028" height="316" alt="image" src="https://github.com/user-attachments/assets/86df9c32-93d2-4fef-96ef-f8e7ca9bc808" />


6<img width="1609" height="400" alt="image" src="https://github.com/user-attachments/assets/b58440e9-9ab7-4938-8d5e-16a5bd303334" />


7<img width="1615" height="454" alt="image" src="https://github.com/user-attachments/assets/c2765375-e7fe-4ee7-b55b-42ff97f8a0d2" />


8<img width="1612" height="399" alt="image" src="https://github.com/user-attachments/assets/36b0f4bc-9850-49cb-a42a-74bce52f0986" />


9<img width="1600" height="456" alt="image" src="https://github.com/user-attachments/assets/30051716-af05-41fa-8981-77f7e9bd8b7b" />


10<img width="1602" height="375" alt="image" src="https://github.com/user-attachments/assets/b8382c47-e2bb-49c3-9d46-f8cfdbfd251d" />

Why does DELETE return 204 and not 200? **When a DELETE request works, the game is removed, so there is nothing left to send back. The status code 204 means “success, no content.” A 200 code normally comes with a response body, so using it for an empty reply would be odd. The empty reply with a 204 still tells the client that the delete worked.**
