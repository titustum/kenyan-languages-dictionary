
# Kenyan Languages Visual Dictionary

An interactive, community-driven dictionary of Kenyan languages and tribes built with Laravel 12+ and TailwindCSS.  
Users can explore words with images, audio pronunciations, and cultural context. Registered contributors can add new entries and get recognized as top contributors.

---

## Features

- 43+ Kenyan languages/tribes (starting with a pilot set)
- Visual dictionary with pictures and audio
- User registration and authentication
- Contributor recognition leaderboard
- Clean, responsive UI powered by TailwindCSS
- SEO-friendly URLs with slugs for languages and words
- Admin panel (optional) for managing entries and users

---

## Tech Stack

- Backend: Laravel 12+
- Frontend: Blade + TailwindCSS
- Database: MySQL / PostgreSQL / SQLite
- Storage: Local disk or cloud (S3, etc.) for images and audio files

---

## Installation

1. Clone the repository  
   ```bash
   git clone https://github.com/yourusername/kenyan-languages-dictionary.git
   cd kenyan-languages-dictionary
   ```

2. Install PHP dependencies

   ```bash
   composer install
   ```

3. Install NPM dependencies and build assets

   ```bash
   npm install
   npm run dev
   ```

4. Setup environment file

   ```bash
   cp .env.example .env
   ```

   Configure your database and other settings in `.env`

5. Generate application key

   ```bash
   php artisan key:generate
   ```

6. Run migrations

   ```bash
   php artisan migrate
   ```

7. (Optional) Seed database with sample data

   ```bash
   php artisan db:seed
   ```

8. Start the development server

   ```bash
   php artisan serve
   ```

---

## Usage

* Register a user account to contribute new dictionary entries
* Browse languages and explore word lists with images and audio
* View top contributors and their contributions
* Admins can manage entries and moderate content (if implemented)

---

## Contributing

Contributions are welcome!
Feel free to submit pull requests or open issues.
Please follow the code style and add tests where applicable.

---

## License

MIT License © \[Your Name or Organization]

---

## Contact

* \[Your Name]
* Email: [your.email@example.com](mailto:your.email@example.com)
* GitHub: [yourusername](https://github.com/yourusername)
* Twitter: [@yourhandle](https://twitter.com/yourhandle)

---

## Roadmap (Ideas)

* Mobile app with offline support
* Phrasebook and language comparison tools
* Community forums and messaging
* More multimedia (videos, stories, idioms)

---

Thank you for supporting Kenyan cultural heritage and languages! 🌍🇰🇪