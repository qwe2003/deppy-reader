#!/bin/bash

# Abfrage nach der URL der Website
read -p "Enter website URL: " url

# Extraktion der Video-URL mithilfe von youtube-dl
video_url=$(youtube-dl --get-url $url)

# Herunterladen des Videos mithilfe von wget
wget $video_url -O video.mp4
