# Connect pbf-alfa Service to MySQL on Railway Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Connect the Laravel application (`pbf-alfa`) to the MySQL database service on Railway using the Railway CLI.

**Architecture:** We will set the database environment variables on the `pbf-alfa` service in Railway using the Railway CLI. The application will use these static variables to connect to the MySQL database.

**Tech Stack:** Laravel, Railway CLI, MySQL.

## Global Constraints

- Must use static credentials for MySQL connection.
- Must use the Railway CLI to configure the variables.

---

### Task 1: Configure Database Environment Variables on pbf-alfa Service

**Files:**
- Modify: Service environment variables on Railway for service `pbf-alfa`

**Interfaces:**
- Consumes: Static credentials of `MySQL` service
- Produces: Connected Laravel application

- [ ] **Step 1: Set database environment variables on pbf-alfa service**

Run the following command to set the connection variables:
```bash
railway variable set \
  DB_CONNECTION=mysql \
  DB_HOST=mysql.railway.internal \
  DB_PORT=3306 \
  DB_DATABASE=railway \
  DB_USERNAME=root \
  DB_PASSWORD=zXoSFjcptSncNhawxdaNfopQTISrRYZw \
  --service pbf-alfa
```

Expected output:
```
✔ Set 6 variables on pbf-alfa
```

- [ ] **Step 2: Verify that variables are set correctly on the service**

Run:
```bash
railway variable list --service pbf-alfa
```

Expected: The listed variables should include the new `DB_*` connection keys with the correct values.

- [ ] **Step 3: Monitor deployment status**

Run:
```bash
railway status
```

Expected: Service `pbf-alfa` should trigger a redeploy automatically and eventually show status as `Online`.

- [ ] **Step 4: Commit and finalize**

Write the results and commit the plan file.
```bash
git add docs/superpowers/plans/2026-06-18-railway-mysql-connection.md
git commit -m "docs: add implementation plan for railway mysql connection"
```
