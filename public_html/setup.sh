#!/bin/bash

# 🚀 Installation Script for Snus Egypt Frontend Updates
# This script will install all dependencies and build the project

echo "================================"
echo "🚀 Snus Egypt Frontend Setup"
echo "================================"
echo ""

# Check if we're in the right directory
if [ ! -f "package.json" ]; then
    echo "❌ Error: package.json not found!"
    echo "Please run this script from the public_html directory."
    exit 1
fi

echo "✅ Found package.json"
echo ""

# Check Node.js version
NODE_VERSION=$(node --version)
echo "📦 Node.js version: $NODE_VERSION"

# Check if Node.js version is 18 or higher
NODE_MAJOR_VERSION=$(echo $NODE_VERSION | cut -d'.' -f1 | sed 's/v//')
if [ $NODE_MAJOR_VERSION -lt 18 ]; then
    echo "⚠️  Warning: Node.js version should be 18 or higher"
    echo "Current version: $NODE_VERSION"
fi

echo ""
echo "📥 Installing dependencies..."
echo "This may take a few minutes..."
echo ""

# Install dependencies
npm install

if [ $? -eq 0 ]; then
    echo ""
    echo "✅ Dependencies installed successfully!"
else
    echo ""
    echo "❌ Failed to install dependencies"
    exit 1
fi

echo ""
echo "🔨 Building assets..."
echo ""

# Build assets
npm run build

if [ $? -eq 0 ]; then
    echo ""
    echo "✅ Assets built successfully!"
else
    echo ""
    echo "❌ Failed to build assets"
    exit 1
fi

echo ""
echo "================================"
echo "✅ Setup Complete!"
echo "================================"
echo ""
echo "Next steps:"
echo ""
echo "1. Start development server:"
echo "   npm run dev"
echo ""
echo "2. Or start Laravel server:"
echo "   php artisan serve"
echo ""
echo "3. Open your browser at:"
echo "   http://localhost:8000"
echo ""
echo "📖 For more details, check HOW_TO_USE.md"
echo ""
