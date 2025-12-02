#!/bin/bash

set -e

TARGET_DIR="music-api"

echo "🚀 Starting Laravel Deployment..."

# Move into project folder
cd "$TARGET_DIR"

echo "📦 Installing Composer dependencies..."
composer install --no-interaction --prefer-dist

# Copy .env if missing
if [ ! -f .env ]; then
    echo "📝 Creating .env file..."
    cp .env.example .env
fi

echo "🔑 Generating app key..."
php artisan key:generate

# Create SQLite database if needed
if [ ! -f database/database.sqlite ]; then
    echo "📄 Creating SQLite database..."
    touch database/database.sqlite
fi

echo "🧹 Clearing and optimizing..."
php artisan optimize:clear
php artisan optimize

echo "🏗️ Running migrations with seed..."
php artisan migrate:fresh --seed

echo "📡 Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=8000

echo ""
echo "✅ Setup complete!"
echo ""
echo "To test API endpoints:"
echo "  curl http://localhost:8000/api/v1/artists"
echo "  curl http://localhost:8000/api/v1/songs"
echo "  curl http://localhost:8000/api/v1/artists/1"
echo ""
echo "To see all API routes:"
echo "  php artisan route:list --path=api"
