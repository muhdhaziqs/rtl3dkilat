import os
import json

# Use current directory, since you're already inside Strike_locations/
folder = '.'
files = sorted([
    f for f in os.listdir(folder)
    if f.endswith('.csv') and '3D_' in f
])
with open(os.path.join(folder, 'filelist.json'), 'w') as f:
    json.dump(files, f, indent=2)

print("✅ file-list.json created successfully in the current folder.")
