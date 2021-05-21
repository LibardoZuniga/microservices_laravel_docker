FROM node:12.8.1-alpine


# install simple http server for serving static content
RUN npm install -g http-server

# make the 'app' folder the current working directory
WORKDIR /usr/src/app

# copy both 'package.json' and 'package-lock.json' (if available)
#COPY package*.json ./

# install project dependencies
#RUN npm install

# copy project files and folders to the current working directory (i.e. 'app' folder)
#COPY . .

# build app for production with minification
#RUN npm run build
ARG VIRTUAL_HOST
ENV VIRTUAL_HOST $VIRTUAL_HOST
EXPOSE 8080
CMD [ "http-server" ]