# Amplify

A WordPress theme for the Amplify, a small website with a focus on putting smaller artists in the spotlight.

<br/>
<br/>

## How to contribute (setup)

For people in the Amplify team.
I think this setup process is a little complicated, so it's best we go over it together.  

<br/>

### Have a PHP server installed

You can use something like Jetbrain's PHPStorm, I think?

Personally since I don't use Jetbrain's products, I use [XAMPP](https://www.apachefriends.org/) for my PHP shit. The files that XAMPP will serve are located under xampp/htdocs.

<br/>

### Install wordpress

You should have an empty PHP project/server now. In case you use XAMPP, delete all that trash in the htdocs folder.

Now it's time to download wordpress and install it ourselves: [download](https://wordpress.org/download/)

unzip that shit and throw all the documents/folders in there in your project/htdocs.

<br/>

### Setup wordpress

So run your server (and also mysql database). If you go to localhost in your browser you should now see the wordpress setup shit. Follow the steps.

For database information, it is often as follows, but might be different:

- username: root
- host: localhost
- password: (nothing)

<br/>

### Clone the repository

clone the respository in wpcontent/themes/amplify:

```bash
git clone [HTTPS/SSH]
```

<br/>

### Make sure you have Node.js installed

To use tailwindcss, you're gonna need to have Node.js installed on your system. I'll save you the long history, but a lot of technologies nowadays are build with JavaScript, a language that used to only really run in browsers for websites. Node.js allows us to run JavaScript like any other programming language on the system. It's super famous, and yes, you're gonna need it later in TI.

Go To the following [link](https://nodejs.org/en/download/prebuilt-installer), and install the latest LTS release of node.js for your system.

<br/>

### Install the TailwindCSS & maybe other packages

Node.js has something pretty neat built into it: NPM. A package manager 🤯. You won't need to do any configuation just type the following command in your terminal:

```bash
npm install
```

There should now be a node_modules folder woo.

<br/>

### Make sure your IDE is correctly set up

I personally use VS Code, which has the great extension Tailwind CSS IntelliSense. Installing this will give you the ability to see what each tailwind class does, and it also autcompletes. Highly recommended

JetBrains IDE's should have native support for Tailwind as long as you have Node.js installed and correctly configured. Personally don't use JetBrains so don't know exactly how it works.

### Run TailwindCSS

Tailwind basically works as follows:

1. Takes in a CSS file
2. Searches all files for tailwind classes
3. Combines this input CSS file together with tailwind classes into a new CSS file

See pretty easy technology wise. But Tailwind doesn't run on itself since you aren't really running anything, the server is separate. So you gotta run tailwind separately usually. Not sure if it's different for Jetbrains shit but whatever.

Just type in the following command in your terminal every time you work on the theme:

```bash
npx tailwindcss -i ./tailwind.css -o ./style.css --watch
```