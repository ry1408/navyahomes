# 🚀 NavyaHomes Website - Railway Deployment Guide

## Railway पर Live करने के Steps (Simple)

### **Step 1: Railway Account बनाओ (यह करो!)**
- Website खोलो: **https://railway.app**
- "Get Started" या "Start Building" पर क्लिक करो
- **"Login with GitHub"** चुनो
- अपना GitHub account (ry1408) से login करो
- Allow permissions दे दो

---

### **Step 2: नया Project बनाओ (यह करो!)**
1. Railway dashboard में आओ
2. **"New Project"** बटन पर क्लिक करो
3. **"Deploy from GitHub repo"** चुनो
4. अपनी list में **"navyahomes"** repository ढूंढो
5. उस पर क्लिक करो → Deploy हो जाएगा

---

### **Step 3: Database Add करो (यह करो!)**
1. Railway dashboard में अपना project खोलो
2. **"+ Add"** बटन देखो (top right)
3. **"Database"** → **"MySQL"** चुनो
4. MySQL automatically add हो जाएगा
5. Connection details auto-linked हो जाएंगी

---

### **Step 4: Variables Set करो (यह करो!)**
Project के अंदर:
1. **"Variables"** tab में जाओ
2. ये 3 variables add करो:

```
APP_ENV = production
APP_DEBUG = false
APP_KEY = base64:n9VD5A5/RTni4YLgjJ0xJ8WViIRXzbRAQHcdjbtQ5pw=
```

**Note:** DATABASE variables Railway खुद add करेगा!

---

### **Step 5: Deploy को Monitor करो**
1. **"Deployments"** tab में जाओ
2. Deployment progress deख सकते हो
3. Log देख सकते हो (अगर कोई error हो)

---

### **Step 6: Live URL मिल गया!**
✅ Deploy complete होने के बाद
✅ "Domains" में URL दिखेगा जैसे:
   - `https://navyahomes-production-xxxx.railway.app`

✅ उस URL को खोलो - Website live होगी!

---

## **अगर Error आए तो:**

### **"Cannot find module" error:**
- यह Railway को code build करने में समस्या है
- Railway dashboard में "Redeploy" बटन दबाओ

### **"Database not found" error:**
- MySQL service add करो (Step 3)
- फिर Redeploy करो

### **"502 Bad Gateway" error:**
- 2-3 minutes wait करो, Railway को setup के लिए time चाहिए
- फिर refresh करो

---

## **अगर सब कुछ ठीक है तो:**

✅ Website खुल गई Railway पर
✅ Contact form काम कर रहा है
✅ Admin panel काम कर रहा है
✅ Images load हो रही हैं

---

## **Custom Domain जोड़ने के लिए (Optional):**
1. अपना domain (navyahomes.in) खरीदो
2. Railway → Domain settings में जाओ
3. Custom domain add करो
4. Domain settings में nameservers update करो

---

**अगर कोई step में problem हो तो बताओ!** 👍
