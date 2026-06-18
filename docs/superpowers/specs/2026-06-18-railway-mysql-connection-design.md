# Design Spec: Connecting pbf-alfa Service to MySQL on Railway

This document outlines the design to connect the Laravel application (`pbf-alfa`) with the MySQL database service on Railway using the Railway CLI.

## Goal
Configure the `pbf-alfa` service in the Railway project to use the static connection credentials of the `MySQL` service.

## Database Credentials (Static)
We will use the following credentials obtained from the `MySQL` service:
- **Host**: `mysql.railway.internal`
- **Port**: `3306`
- **Database**: `railway`
- **Username**: `root`
- **Password**: `zXoSFjcptSncNhawxdaNfopQTISrRYZw`

## Configuration Steps
We will use the Railway CLI to set the environment variables on the `pbf-alfa` service:

```bash
railway variable set \
  DB_CONNECTION=mysql \
  DB_HOST=mysql.railway.internal \
  DB_PORT=3306 \
  DB_DATABASE=railway \
  DB_USERNAME=root \
  DB_PASSWORD=zXoSFjcptSncNhawxdaNfopQTISrRYZw \
  APP_NAME=Laravel \
  APP_ENV=production \
  APP_KEY=base64:CcFaigwJDjBzNKn02pNv/DRZ1xExDbWkNVoetXv0oPk= \
  APP_DEBUG=false \
  APP_URL=https://pbf-alfa-production.up.railway.app \
  SESSION_DRIVER=database \
  QUEUE_CONNECTION=database \
  CACHE_STORE=database \
  --service pbf-alfa
```

## Verification
1. List variables on `pbf-alfa` to confirm they are set correctly.
2. Monitor deployment status to ensure the service successfully deploys.
