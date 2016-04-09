import React           from "react";
import ReactDOM        from "react-dom";
import Presentation    from "./presentation.jsx";
import Skills          from "./skills.jsx";
import Projects        from "./projects.jsx";
import Experiences     from "./experiences.jsx";
import Container       from "./components/container.jsx";
import FooterCopyright from "./components/footer-copyright.jsx";
import Github          from "./components/github.jsx";
import Modal           from "./components/modal.jsx";
import ModalBody       from "./components/modal-body.jsx";
import ModalFooter     from "./components/modal-footer.jsx";
import LegalMention    from "./legal-mention.jsx";
import OpenModal       from "./open-modal-legal-mention.jsx";

const main = <div style={{ width: "100%", height: "100%" }} >
    <Presentation />
    <Skills />
    <Projects />
    <Experiences />

    <Modal id="legal-mention" >
        <ModalBody>
            <h4>Legal mention</h4>

            <LegalMention />
        </ModalBody>
    </Modal>
</div>;

const footer = <div>
    <Container>
        <div className="row" >
            <div className="col s12 m3 l3" >
                <h5 className="white-text" >Links</h5>

                <ul>
                    <li><a target="_blank" className="white-text" href="https://www.linkedin.com/in/florentin-dubois-73b045114?trk=hp-identity-name" >Linkedin</a></li>
                    <li><a target="_blank" className="white-text" href="https://twitter.com/FlorentinDUBOIS" >Twitter</a></li>
                    <li><a target="_blank" className="white-text" href="https://github.com/FlorentinDUBOIS" >Github</a></li>
                    <li><a target="_blank" className="white-text" href="https://hub.docker.com/r/florentindubois" >Dockerhub</a></li>
                    <li><a target="_blank" className="white-text" href="https://travis-ci.org/FlorentinDUBOIS" >Travis CI</a></li>
                    <li><a className="white-text" href="mailto:contact@florentin-dubois.fr" >Contact me</a></li>
                </ul>
            </div>

            <div className="col s12 m3 l3" >
                <h5 className="white-text" >About</h5>

                <p>
                    <OpenModal className="white-text" open="#legal-mention" >Legal mention</OpenModal>
                </p>
            </div>

            <div className="col s12 m6 l6" >
                <h5 className="white-text" >A little word</h5>

                <p className="white-text" >Have a good visit !</p>
            </div>
        </div>
    </Container>

    <FooterCopyright>
        <Container>
            © {(new Date()).getFullYear()} Copyright MIT - Florentin DUBOIS

            <Github className="right white-text" depot="portfolio/tree/v2" >
                View on Github
            </Github>
        </Container>
    </FooterCopyright>
</div>;

ReactDOM.render( main, document.querySelector( 'main' ));
ReactDOM.render( footer, document.querySelector( 'footer' ));
