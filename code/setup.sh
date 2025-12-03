#!/bin/bash

set -ex  # stop on error
trap 'echo "❌ Script failed on line $LINENO"; read -p "Press ENTER to exit..."' ERR

echo "🚀 Starting Laravel Docker Deployment..."

# 1. Build fresh images (no cache)
echo "🔧 Building Docker images..."
docker compose build --no-cache

# 2. Start containers
echo "📦 Starting containers..."
docker compose up -d

read -p "Press ENTER to close this window..."