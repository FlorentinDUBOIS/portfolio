import React    from "react";
import ReactDOM from "react-dom";
import {Row, Col} from "./components/grid.jsx";
import {Presentation} from "./presentation.jsx";
import {Overflow} from "./components/overflow.jsx";

const main = (
    <div className="blue darken-3" >
        <Overflow>
            <Row>
                <Col col="s12 m6 l4" offset="m3 l4" >
                    <Presentation />
                </Col>
            </Row>
        </Overflow>
    </div>
);

ReactDOM.render( main, document.querySelector( 'main' ));
