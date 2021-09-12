import * as React from "react";

function IconArrowUpRightCircle({
  size = 24,
  color = "currentColor",
  stroke = 2,
  ...props
}) {
  return <svg className="icon icon-tabler icon-tabler-arrow-up-right-circle" width={size} height={size} viewBox="0 0 24 24" strokeWidth={stroke} stroke={color} fill="none" strokeLinecap="round" strokeLinejoin="round" {...props}><path stroke="none" d="M0 0h24v24H0z" fill="none" /><circle cx={12} cy={12} r={9} /><line x1={15} y1={9} x2={9} y2={15} /><polyline points="15 15 15 9 9 9" /></svg>;
}

export default IconArrowUpRightCircle;