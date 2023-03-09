# docker build -t frontend:latest ./web/docker
# docker run -v ${PWD}/web:/usr/src/app -v /usr/src/app/node_modules -p 3202:5173 -it --rm frontend /bin/bash
FROM node:18.15

WORKDIR /usr/src/app

RUN npm install -g npm@9.6.1

ENTRYPOINT [ "/bin/bash" ]

CMD ["-c", "npm install && npm run dev -- --host 0.0.0.0"]
