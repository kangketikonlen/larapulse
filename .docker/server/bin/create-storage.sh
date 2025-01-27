#!/bin/bash

# Destination directory (current directory)
destination_dir=./storage

# Check if the destination directory already contains the storage folder
if [ -d "$destination_dir" ]; then
    echo "Storage folder already exists in the destination directory. Aborting script."
    exit 0 # Exit with a success status
fi

# Create storage folder
mkdir -p storage

# Create database folder
mkdir -p storage/logs
mkdir -p storage/files

# Path to the source storage folder
source_log_path=../../storage/logs
source_storage_path=../../storage/app/public/.

# Copy the storage folder
cp -r "$source_log_path" "$destination_dir"
cp -r "$source_storage_path" "$destination_dir/files"

echo "Storage folder copied successfully."
