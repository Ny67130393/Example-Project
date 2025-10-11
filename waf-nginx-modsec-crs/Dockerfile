
# waf-nginx-modsec-crs/Dockerfile
FROM owasp/modsecurity-crs:nginx

USER root

# ใช้ modsec.conf ที่เราตั้งค่าเอง (เริ่มแบบ DetectionOnly)
COPY modsec.conf /etc/modsecurity/modsecurity.conf

# ใช้ CRS ที่มากับโปรเจกต์ (หรือจะใช้ของ image ก็ได้)
COPY crs /etc/modsecurity/crs

# ใช้ nginx.conf ของเรา (reverse proxy ไป service ชื่อ web)
COPY nginx.conf /etc/nginx/nginx.conf

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
