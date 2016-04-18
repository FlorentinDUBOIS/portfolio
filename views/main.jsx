import React    from "react";
import ReactDOM from "react-dom";
import {Row, Col} from "./components/grid.jsx";
import {Presentation} from "./presentation.jsx";
import {FrontEnd, BackEnd, OpsSide, Network} from "./skills.jsx";
import {Overflow} from "./components/overflow.jsx";

const main = (
    <div>
        <div className="blue darken-3" >
            <Overflow>
                <Row>
                    <Col col="s12 m6 l4" offset="m3 l4" >
                        <Presentation />
                    </Col>
                </Row>
            </Overflow>
        </div>

        <div>
            <Overflow>
                <Row>
                    <Col col="s12 m4 l4" offset="m2 l2" >
                        <FrontEnd />
                    </Col>

                    <Col col="s12 m4 l4" >
                        <BackEnd />
                    </Col>
                </Row>

                <Row>
                    <Col col="s12 m4 l4" offset="m2 l2" >
                        <OpsSide />
                    </Col>

                    <Col col="s12 m4 l4" >
                        <Network />
                    </Col>
                </Row>
            </Overflow>
        </div>
    </div>
);

ReactDOM.render( main, document.querySelector( 'main' ));
