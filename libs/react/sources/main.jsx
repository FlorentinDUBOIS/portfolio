import React        from "react";
import ReactDOM     from "react-dom";
import Presentation from "./components/presentation.jsx";
import Skills       from "./components/skills.jsx";
import Projects     from "./components/projects.jsx";

const main = <div style={{ width: "100%", height: "100%" }} >
    <Presentation />
    <Skills />
    <Projects />
</div>;

ReactDOM.render( main, document.querySelector( 'main' ));
