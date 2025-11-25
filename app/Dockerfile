FROM node:20.19

WORKDIR /app

COPY package.json /app/package.json
COPY package-lock.json /app/package-lock.json

RUN npm ci

COPY . .

EXPOSE 5173

CMD ["npm", "run", "dev"]