# Devzign Institute Backend

Sample PHP backend for an education platform with basic authentication, course management, and Q&A forum. APIs live under `api/` and a very small admin panel is available under `admin/`.
Each user receives a unique `devzign_id` when registering.

## Setup

1. Create MySQL database and import `database.sql`.
2. Set environment variables `DB_HOST`, `DB_NAME`, `DB_USER`, and `DB_PASS` or edit `config/config.php`.
3. Deploy the `api/` and `admin/` directories on a PHP server.

API entry point is `api/index.php` and accepts requests like:

```
POST /api/index.php?path=auth/register
POST /api/index.php?path=auth/login
GET  /api/index.php?path=courses
```
The registration endpoint returns a JSON object including a `devzign_id` for the new user.
