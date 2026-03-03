#!/bin/bash
set -e

# Disable all possible MPMs to avoid conflicts (Railway sometimes enables extra ones)
a2dismod mpm_event 2>/dev/null || true
a2dismod mpm_worker 2>/dev/null || true
a2dismod mpm_prefork 2>/dev/null || true

# Enable only mpm_prefork (compatible with mod_php)
a2enmod mpm_prefork

# Start Apache in the foreground (required for Docker)
exec apache2-foreground

